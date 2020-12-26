<?php

use yii\helpers\Url;
/* @var $this yii\web\View */
use vova07\imperavi\Widget;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;


$this->title = 'Blog';


echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '/post/_post_preview',
]);
