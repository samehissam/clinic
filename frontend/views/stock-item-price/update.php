<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\StockItemPrice */


?>
<div class="stock-item-price-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
    <div ng-app="myApp" ng-controller="patientTypeCtrl" >
      <div class="col-md-1"></div>

     <div class="row col-md-10">

         <table class="table table-striped">
             <thead class="color">
     <tr>
       <th>إسم الجهة</th>
       <th>نسبة البيع</th>
       <th>تعديل النسبة</th>
     </tr>
    </thead>
    <tr ng-repeat="order in data">
    <td>{{order.type_name}}</td>
    <td>{{order.item_price}}</td>


    <td>

      <a href="/clinic/frontend/web/index.php?r=stock-item-price/update&id={{order.id}}" style="margin-right: 20px;">
      <span class="glyphicon glyphicon-pencil" ></span></a>


    </td>

    </tr>
    </table>
    </div>
    </div>

    </div>
