<?php
 
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;

$this->title = Yii::t('app', $model->username);
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-profile">
    <h2><?= Html::encode($this->title) ?></h2>
    <h3><?= 'Список'.$substr.'публикаций'?></h3>
</div>

<?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '/post/_post_preview',
    ]);
?>

