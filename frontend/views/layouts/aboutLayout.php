<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use kartik\sidenav\SideNav;
use yii\helpers\Url;

//use Zelenin\yii\SemanticUI\Elements;
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <!--How to change website icon-->
    <link rel="shortcut icon" href="/shop/frontend/web/images/cart.png">
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">

    <?php
    NavBar::begin([
        'brandLabel' => '<i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;<span class="span">E</span>asy <span class="span">C</span>ashier</span>',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top b',
        ],
    ]);


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        //'items' => $menuItems,
        'encodeLabels' => false,
        'items' => [

            ['label' => ' <i class="fa fa-money" aria-hidden="true"></i>&nbsp; إضافة مصروف', 'url' => Url::to(['expenses/create'])],
            ['label' => '<i class="fa fa-search" aria-hidden="true"></i>&nbsp; قائمة الأسعار', 'url' => ['product/show']],

            ['label' => '<i class="fa fa-list" aria-hidden="true"></i>&nbsp;تقارير المصروفات', 'url' => Url::to(['expenses/ask'])],
            ['label' => '<i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp; الكاشير', 'url' => ['orders/create']],

   Yii::$app->user->isGuest ?
    // ['label' => '<span class="glyphicon glyphicon-user"></span> التسجيل', 'url' => ['/site/signup']]:
             ['label' => '<span class="glyphicon glyphicon-user"></span>&nbsp; تسجيل الدخول', 'url' => ['/site/login']]:

        ['label' => '<span class="glyphicon glyphicon-off"></span> خروج(' . Yii::$app->user->identity->username . ')',
            'url' => ['/site/logout'],
            'linkOptions' => ['data-method' => 'post']
        ],


        ]]);

    NavBar::end();


    ?>





    <div class="row downn">
      	<div class="col-md-12 col-sm-11">

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>



    </div>
</div>



<footer class="footer">

	<div class="container">
	    <p class="pull-left">&trade;<span id="footgreen">Easy Cashier Cafe</span>  <?= date('Y') ?></p>
		<p class="pull-right">&copy; Developed By <a href="https://www.facebook.com/sammeh.mourad" target="_blank"> <b>Sameh Mourad</b></a></p>
	</div>

</footer>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
