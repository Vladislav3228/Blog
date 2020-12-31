<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\imagine\Image;
use Imagine\Image\Box;
use app\models\User;

$source="http://localhost/blog/ui/round-account-button-with-user-inside_icon-icons.com_72596.png";        
$imagine = new Image();

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php

    // use yii\bootstrap4\NavBar;
    // use yii\bootstrap4\Nav;
    // use kartik\bs4dropdown\Dropdown;
    // use yii\helpers\Html;

    // NavBar::begin([
    //     'brandLabel' => '',
    //     'brandOptions' => ['class'=>'p-0'],
    //     'options' => ['class' => 'navbar navbar-expand-lg navbar-dark bg-info']
    // ]);
    // echo Nav::widget([
    //     'items' => [
    //         ['label' => '', 'url' => ['/site/index']],
    //         [
    //             'label' => '', 
    //             'items' => [
                    
    //             ],
    //         ],
    //         ['label' => '', 'url' => ['/site/about']],
    //     ],
    //     'dropdownClass' => Dropdown::classname(), // use the custom dropdown
    //     'options' => ['class' => 'navbar-nav mr-auto'],
    // ]);
    // NavBar::end();

    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
            'style' => 'background-color: #e3f2fd;'
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right', 'style' => 'background-color: #fff2fd;'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            ),
            Yii::$app->user->isGuest ? : (
                '<li>'
                . Html::beginForm(['/users/profile'])
                . Html::submitButton(
                    '<div class = "navbar-nav navbar-left", style = "margin-right: 10px;"> '.Yii::$app->user->identity->username.' </div>'.'<img src="data:image/png;base64,'.base64_encode($imagine->getImagine()->open($source)->resize(new Box(18, 18))).'" >',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
