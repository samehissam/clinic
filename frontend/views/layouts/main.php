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
    <link rel="shortcut icon" href="/clinic/frontend/web/images/logo.jpg">
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
        'brandLabel' => '<img src="/clinic/frontend/web/images/logo.jpg" style="    height: 53px;
    width: 121px;
    margin-top: -4px;">',
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
            ['label' => '<i class="fa fa-clinicping-cart" aria-hidden="true"></i>&nbsp; الكاشير', 'url' => ['orders/create']],

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



    <div class="container">

    <div class="row">
        <div class="col-md-9 col-sm-8">

            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>

         <div class="col-md-3 col-sm-2" id="sideNav-margin">


            <a class="list-group-item"  data-toggle="collapse" href="#collapse1"
            style="margin-top:20px; margin-bottom:20px;">
            <i class="glyphicon glyphicon-user" aria-hidden="true"></i> &nbsp;الموظفين</a>

    <div id="collapse1" class="panel-collapse collapse">
      <div class="list-group">
         <a class="list-group-item" href="/clinic/frontend/web/index.php?r=employe/create"
         ><i class="glyphicon glyphicon-user"aria-hidden="true"></i> &nbsp; إضافة موظف جديد
        </a>
         <a class="list-group-item" href="/clinic/frontend/web/index.php?r=employe/report">
           <i class="fa fa-search fa-fw" aria-hidden="true"></i> &nbsp; عرض الموظفين
         </a>
        <a class="list-group-item" href="/clinic/frontend/web/index.php?r=emp-part-salary/create">
         <i class="glyphicon glyphicon-euro" aria-hidden="true"></i> &nbsp; إضافة مستقطع
       </a>
        <a class="list-group-item" href="/clinic/frontend/web/index.php?r=employe-loan/create">
          <i class="fa fa-money fa-fw" aria-hidden="true"></i> &nbsp; إضافة سلفة

      </a>
      </div>

    </div>
  <a class="list-group-item"  data-toggle="collapse" href="#collapse2" style="margin-top:20px; margin-bottom:20px;">
    <i class="fa fa-home fa-fw" aria-hidden="true"></i> &nbsp;المخزن الرئيسي
  </a>

 <div id="collapse2" class="panel-collapse collapse">
      <div class="list-group">
         <a class="list-group-item" href="/clinic/frontend/web/index.php?r=inventory/create">
           <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp;تسجيل صنف جديد
         </a>
         <a class="list-group-item" href="/clinic/frontend/web/index.php?r=inventory/add">
           <i class="glyphicon glyphicon-log-in" aria-hidden="true"></i>&nbsp; تسجيل دخول كمية
        </a>
          <a class="list-group-item" href="/clinic/frontend/web/index.php?r=inventory-history/create">
            <i class="glyphicon glyphicon-log-out" aria-hidden="true"></i>&nbsp; خروج صنف
          </a>
          <a class="list-group-item" href="/clinic/frontend/web/index.php?r=inventory/report">
            <i class="fa fa-bar-chart fa-fw" aria-hidden="true"></i>&nbsp;جرد المخزن
          </a>
          <a class="list-group-item" href="/clinic/frontend/web/index.php?r=inventory-history/report">
            <i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>&nbsp;حركة الأصناف
                    </a>
      </div>

    </div>
        <a class="list-group-item"  data-toggle="collapse" href="#collapse3" style="margin-top:20px; margin-bottom:20px;"><i class="fa fa-clinicping-cart fa-fw" aria-hidden="true"></i> &nbsp;المبيعات</a>

 <div id="collapse3" class="panel-collapse collapse">
      <div class="list-group">
        <a class="list-group-item" href="/clinic/frontend/web/index.php?r=orders/create"><i class="fa fa-clinicping-cart fa-fw" aria-hidden="true"></i> &nbsp; الكــاشــير</a>

              <a class="list-group-item" href="/clinic/frontend/web/index.php?r=orders/order-report"><i class="fa fa-pencil" aria-hidden="true"></i>&nbsp; تعديل الأوردرات </a>

              <a class="list-group-item" href="/clinic/frontend/web/index.php?r=orders/ask"><i class="fa fa-money" aria-hidden="true"></i>&nbsp; تقرير المبيعات والمكسب </a>

               <a class="list-group-item" href="/clinic/frontend/web/index.php?r=orders/ask-shift"><i class="fa fa-money" aria-hidden="true"></i>&nbsp; تقرير المبيعات للشفتات </a>


      </div>

   </div>

   <a class="list-group-item"  data-toggle="collapse" href="#collapse4" style="margin-top:20px; margin-bottom:20px;"><i class="fa fa-barcode fa-fw" aria-hidden="true"></i> &nbsp;الباركود</a>

    <div id="collapse4" class="panel-collapse collapse">
      <div class="list-group">
        <a class="list-group-item" href="/clinic/frontend/views/barcode/html/BCGean13.php"><i class="fa fa-barcode fa-fw" aria-hidden="true"></i> &nbsp;إستخراج باركود جديد</a>




               <a class="list-group-item" href="/clinic/frontend/web/index.php?r=product/product"><i class="fa fa-list" aria-hidden="true"></i>&nbsp; عرض الأصناف للإستخراج باركود </a>


      </div>

   </div>
   </div>


    </div>
</div>

</div>
</div>

<footer class="footer">

    <div class="container">
        <p class="pull-left">&trade;<span id="footgreen"> بــــــــراعــــــم </span>  <?= date('Y') ?></p>
        <p class="pull-right">&copy; Developed By <a href="https://www.facebook.com/sammeh.mourad" target="_blank"> <b>Sameh Mourad</b></a></p>
    </div>

</footer>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
