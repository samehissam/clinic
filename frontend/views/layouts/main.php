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

            ['label' => '<i class="fa fa-home" aria-hidden="true"></i>&nbsp; المخزن الرئيسي', 'url' => Url::to(['inventoemp'])],

            ['label' => '<i class="fa fa-user" aria-hidden="true"></i>&nbsp;اﻷطباء', 'url' => Url::to(['doctor/index'])],
            ['label' => '<i class="glyphicon glyphicon-euro" aria-hidden="true"></i>&nbsp; الكشف', 'url' => Url::to(['#'])],
            ['label' => ' <i class="fa fa-bed" aria-hidden="true"></i>&nbsp; المريض', 'url' => Url::to(['patient/create'])],

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


            <a class="list-group-item"  data-toggle="collapse" href="#emp"
            style="margin-top:20px; margin-bottom:20px;">
            <i class="glyphicon glyphicon-user" aria-hidden="true"></i> &nbsp;الموظفين</a>

    <div id="emp" class="panel-collapse collapse">
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
  <a class="list-group-item"  data-toggle="collapse" href="#inventory" style="margin-top:20px; margin-bottom:20px;">
    <i class="fa fa-home fa-fw" aria-hidden="true"></i> &nbsp;المخزن الرئيسي
  </a>

 <div id="inventory" class="panel-collapse collapse">
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

    <a class="list-group-item"  data-toggle="collapse" href="#indoor" style="margin-top:20px; margin-bottom:20px;">
      <i class="fa fa-home fa-fw" aria-hidden="true"></i> &nbsp;المخزن الداخلي
    </a>

   <div id="indoor" class="panel-collapse collapse">
        <div class="list-group">
           <a class="list-group-item" href="/clinic/frontend/web/index.php?r=indoor-history/create">
             <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp;خروج صنف لمريض
           </a>

            </a>
            <a class="list-group-item" href="/clinic/frontend/web/index.php?r=indoor-history/report">
              <i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>&nbsp;حركة الأصناف
                      </a>
        </div>

      </div>
      <a class="list-group-item"  data-toggle="collapse" href="#inclub" style="margin-top:20px; margin-bottom:20px;">
        <i class="fa fa-home fa-fw" aria-hidden="true"></i> &nbsp;مخزن الحضانة      </a>


      <div id="inclub" class="panel-collapse collapse">
           <div class="list-group">
              <a class="list-group-item" href="/clinic/frontend/web/index.php?r=inclubation-history/create">
                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp;خروج صنف لمريض
              </a>

               </a>
               <a class="list-group-item" href="/clinic/frontend/web/index.php?r=inclubation-history/report">
                 <i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>&nbsp;حركة الأصناف
                         </a>
           </div>

         </div>
      <a class="list-group-item"  data-toggle="collapse" href="#pharmacy" style="margin-top:20px; margin-bottom:20px;">
        <i class="glyphicon glyphicon-euro" aria-hidden="true"></i> &nbsp;الصيدليات      </a>


      <div id="pharmacy" class="panel-collapse collapse">
           <div class="list-group">
              <a class="list-group-item" href="/clinic/frontend/web/index.php?r=pharmacy/create">
                <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp;تسجيل اسم  صيدلية              </a>

               </a>
               <a class="list-group-item" href="/clinic/frontend/web/index.php?r=pharmacy-needs/create">
                 <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp;تسجيل مستلزمات من صيدلية
                         </a>
               <a class="list-group-item" href="/clinic/frontend/web/index.php?r=pharmacy/report">
                 <i class="fa fa-bar-chart-o fa-fw" aria-hidden="true"></i>&nbsp;تقرير الصيدليات
                         </a>
           </div>

         </div>

         <a class="list-group-item"  data-toggle="collapse" href="#price" style="margin-top:20px; margin-bottom:20px;">
           <i class="glyphicon glyphicon-euro" aria-hidden="true"></i> &nbsp;تسعير المستلزمات </a>


         <div id="price" class="panel-collapse collapse">
              <div class="list-group">
                 <a class="list-group-item" href="/clinic/frontend/web/index.php?r=stock-item-price/create">
                   <i class="glyphicon glyphicon-euro" aria-hidden="true"></i>&nbsp;تسعير للجهات</a>

              </div>

            </div>
         <a class="list-group-item"  data-toggle="collapse" href="#doctor" style="margin-top:20px; margin-bottom:20px;">
           <i class="glyphicon glyphicon-user" aria-hidden="true"></i> &nbsp;اﻷطباء </a>


         <div id="doctor" class="panel-collapse collapse">
              <div class="list-group">
                 <a class="list-group-item" href="/clinic/frontend/web/index.php?r=doctor-needs/create">
                   <i class="glyphicon glyphicon-pencil" aria-hidden="true"></i>&nbsp;تسجيل مستلزمات</a>

                 <a class="list-group-item" href="/clinic/frontend/web/index.php?r=doctor-needs/doctor-report">
                 <i class="fa fa-pencil fa-fw"  aria-hidden="true"></i>&nbsp;مستلزمات طبيب</a>

                 <a class="list-group-item" href="/clinic/frontend/web/index.php?r=doctor-needs/report">
                 <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>&nbsp;جرد المستلزمات</a>

              </div>

            </div>

            <a class="list-group-item"  data-toggle="collapse" href="#bank" style="margin-top:20px; margin-bottom:20px;">
              <i class="fa fa-bank" aria-hidden="true"></i> &nbsp;تعاملات البنوك</a>


            <div id="bank" class="panel-collapse collapse">
                 <div class="list-group">
                    <a class="list-group-item" href="/clinic/frontend/web/index.php?r=bank-movement/create">
                         <i class="fa fa-pencil fa-fw"  aria-hidden="true"></i>&nbsp;تسجيل التعاملات</a>

                    <a class="list-group-item" href="/clinic/frontend/web/index.php?r=bank-movement/report">
                       <i class="fa fa-bar-chart-o fa-fw"  aria-hidden="true"></i>&nbsp;تقرير المعاملات</a>

                 </div>

               </div>

            <a class="list-group-item"  data-toggle="collapse" href="#admin" style="margin-top:20px; margin-bottom:20px;">
          <i class="glyphicon glyphicon-log-in" aria-hidden="true"></i> &nbsp;اﻷدمن</a>


            <div id="admin" class="panel-collapse collapse">
                 <div class="list-group">
                    <a class="list-group-item" href="/clinic/frontend/web/index.php?r=site/signup">
                    <i class="glyphicon glyphicon-log-in"  aria-hidden="true"></i>&nbsp;فتح حساب لموظف</a>

                    <a class="list-group-item" href="/clinic/frontend/web/index.php?r=auth-assignment/create">
                       <i class="fa fa-user  fa-fw"  aria-hidden="true"></i>&nbsp;صلاحيات الموظفين</a>

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
