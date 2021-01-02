<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use yii\models\Post;
use \yii\widgets\Pjax;

$this->title = 'Post';
$this->params['breadcrumbs'][] = $this->title;
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
        }
        td.rightcol { /* Правая ячейка */ 
            text-align: right; /* Выравнивание по правому краю */
        }
    </style>
    
    <h1><b><center><?php echo Html::encode($model->title); ?></center></b></h1>
    <!-- <h2><center><?= Html::encode($model->title) ?></center></h2> -->
    <br>
    <?= HtmlPurifier::process($model->text) ?>
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

    <?php Pjax::begin([
        'id'                 => 'like-pjax',
        'enablePushState'    => false,
        'enableReplaceState' => false,
        'linkSelector'       => '#like-pjax a',
        'timeout'            => 10000,
    ]);
    ?>

    <?php if (empty($like)) { ?>

    <hr>
    <?= Html::a('LIKE', ['post/post-view', 'like' => 1, 'id' => $model->id]) ?>

    <?= Html::a('DISLIKE', ['post/post-view', 'like' => -1, 'id' => $model->id]) ?>

    <?php } else { ?>

        <hr>
        <p>
            <?= ($like == 1) ? 'Стоит ваш царский лайк' : 'Не, ну это бан'; ?>
        </p>

    <?php } Pjax::end()?>

    <br>
    <br>
    <br>
</div>