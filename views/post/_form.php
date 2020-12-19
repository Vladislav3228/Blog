<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use vova07\imperavi\Widget;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'created_at')->textInput() ?> -->

    <!--<?= $form->field($model, 'updated_at')->textInput() ?> -->

    <?= $form->field($model, 'preview')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'imageUpload' => Url::to(['site/image-upload']),
        ],
        'plugins' => [ 
            'imagemanager' => 'vova07\imperavi\bundles\ImageManagerAsset'
        ],
    ]); ?>

    <?= $form->field($model, 'text')->widget(Widget::className(), [
        'settings' => [
            'lang' => 'ru',
            'minHeight' => 200,
            'fileManagerJson' => Url::to(['site/files-get']),
            'fileUpload' => Url::to(['site/file-upload']),
            'fileDelete' => Url::to(['site/file-delete']),
            'imageUpload' => Url::to(['site/image-upload']),
            
        ],
        'plugins' => [
            'filemanager' => 'vova07\imperavi\bundles\FileManagerAsset',    
            'imagemanager' => 'vova07\imperavi\bundles\ImageManagerAsset'
        ],
    ]); ?>

    

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
