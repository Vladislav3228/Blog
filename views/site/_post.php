<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use yii\models\Post;
?>
<div class="post">
    <style>
        table.text  {
            width:  100%; /* Ширина таблицы */
            border-spacing: 0; /* Расстояние между ячейками */
        }
        table.text td {
            width: 50%; /* Ширина ячеек */
            vertical-align: top; /* Выравнивание по верхнему краю */
            color: #CD6829;
            opacity: .7;
        }
        td.rightcol { /* Правая ячейка */ 
            text-align: right; /* Выравнивание по правому краю */
        }
    </style>
    <h1><b><center><?php //echo Html::a(Html::encode($model->title), Url::to(['post/post-view', 'id' => $model->id])); ?></center></b></h1>
    <!-- <h2><center><?//= Html::encode($model->title) ?></center></h2> -->
    <?= Html::a(HtmlPurifier::process($model->preview), Url::to(['post/post-view', 'id' => $model->id])); ?>
    <br>
    <table class="text">
        <tr>
            <td><?= $model->getAttributeLabel('created_at') ?></td>
            <td class="rightcol"><?= $model->created_at ?></td>
        </tr>
        <tr>
            <td><?= $model->getAttributeLabel('updated_at') ?></td>
            <td class="rightcol"><?= $model->updated_at ?></td>
        </tr>
    </table>
    <br>
    <br>
    <br>
</div>