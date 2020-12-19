<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\HtmlPurifier;
use yii\models\Post;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\widgets\ListView;
use yii\console\widgets\Table;
?>
<div class="search">
    <?php
    if(isset($this->context->search) && $this->context->search != null)
    {
        $model = $this->context->search;
    }
    else{
        $model = new PostSearch();
    }
    $form = ActiveForm::begin([
        'id' => 'firstRow',
        'method' => 'get',
        'action' => ['/site/search-post'],
        'options' => ['class' => 'firstRowForm']
    ]) ?>
    <table>
        <td>
            <?= $form->field($model, 'created_at')->widget(DatePicker::className(), [
                'pluginOptions' => [
                    'format' => 'yyyy-mm-dd'
                ]
            ])->label(false); ?>
        </td>
        <td>
            <?= $form->field($model, 'search_text')->textInput()->label(false)//->hint('Милости просим')->label('Строка'); ?>
        </td>
        <td>
            <div class="secondRow clearfix">
                <?= Html::input('submit',null,'Найти', ['class' => 'peopleSubmit']) ?>
            </div>
        </td>
    </table>
    <?php ActiveForm::end() ?>
</div>

<?php
    echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_post',
    ]);
// foreach($dataProvider->models as $k=>$val){
//     echo $val->title.'<br>';
// }
?>