<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Post;
use app\models\PostSearch;
use yii\widgets\ActiveForm;
use yii\data\ActiveDataProvider;
use app\models\SignupForm;
use app\models\User;
use yii\data\Pagination;

class UsersController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => User::find(),
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
        return $this->render('index', ['dataProvider' => $dataProvider]);
    }
    
    public function actionProfile($username = null)
    {
        $searchModel = new PostSearch();

        if(!isset($username)){
            if(!Yii::$app->user->isGuest){
                $model = User::findOne(Yii::$app->user->id);
            } else {
                throw new ForbiddenHttpException;
            }
        } else {
            $model = $this->findModel($username);
        }

        $dataProvider = new ActiveDataProvider([
            'query' => Post::find(['author_id' => $model->id]),
            'pagination' => [
                'pageSize' => 1,
            ],
        ]);
        
        return $this->render('profile', [
            'dataProvider' => $dataProvider,
            'model' => $model,
            'substr' => !isset($username) ? ' ваших ' : ' ',
        ]);
    }

    protected function findModel($username)
    {
        if (($model = User::find()->where(['username' => $username])->one()) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
