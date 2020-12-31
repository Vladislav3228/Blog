<?php

use yii\helpers\Url;
/* @var $this yii\web\View */
use vova07\imperavi\Widget;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use yii\widgets\ActiveForm;


$this->title = 'Blog';

// use yii\imagine\Image;
// use Imagine\Image\Box;

// $source="http://localhost/blog/ui/round-account-button-with-user-inside_icon-icons.com_72596.png";        
// $imagine = new Image();
// echo '<img src="data:image/png;base64,'.base64_encode($imagine->getImagine()->open($source)->resize(new Box(24, 24))).'" > профиль';

echo ListView::widget([
    'dataProvider' => $dataProvider,
    'itemView' => '/post/_post_preview',
]);
