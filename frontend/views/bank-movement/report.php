<?php
$this->title = "تقرير الفواتير";
$connection=\Yii::$app->db;
$getPutMoney = $connection->createCommand('SELECT sum(bank_movement.money) as sumAll
  FROM bank_movement where transaction_state = 2')->queryAll();

$getOutMoney = $connection->createCommand('SELECT sum(bank_movement.money) as sumAll
  FROM bank_movement where transaction_state = 1')->queryAll();


?>

<div ng-app="myApp" ng-controller="bankReportCtrl">
<div class="total" style="margin-top:4px; height:60px;">
  <button type="button"  onclick="printPart('report')" name="button" class="btn1 btn-danger" style="    float: left;
    margin-right: 11px;
    margin-left: 11px;"><i class="fa fa-print"></i></button>
 <div class="col-md-4">
   <select id="pharmacy_select"  class="form-control"
  name="type" ng-model="filter.type" required="true">
  <option value="">حدد نوع العملية</option>


<option value='سحب'>
  عملية سحب
</option>
<option value='إيداع'>
  عملية إيداع

</option>
  </select>
 </div>

 </div>



<div class="clearfix"></div>

      <div class="row" id="report">
        <p class="total text-center space">المعاملات مع البنوك </p>
          <table class="table table-bordered">
              <thead class="color">
      <tr>
        <th>العملية</th>
        <th>المبلغ</th>
        <th>التعليق</th>
        <th>تاريخ العملية</th>
        <th>تعديل </th>



      </tr>
    </thead>

   <tr ng-repeat="item in data |filter:{type_name:filter.type} ">
     <td>{{item.type_name}}</td>
     <td>{{item.money}}</td>
     <td>{{item.comment}}</td>


     <td>{{item.transaction_date}}</td>
<!-- |filter:{barcode:filter.barcode} | filter:{order_qty:filter.qty}|filter:{invoice_id:filter.invoic} |filter:{model:model} -->

<td>

		<a style="margin-right:16px;"href='/clinic/frontend/web/index.php?r=bank-movement/update&id={{item.movement_id}}'><span class="glyphicon glyphicon-pencil" ></span> </a>

	</td>

   </tr>
 </table>

  <p class="total text-center space">إجمالي عمليات الإيداع&nbsp;&nbsp;<span style="color:red">
  <?=$getPutMoney[0]["sumAll"] ."</span>&nbsp;&nbsp;". "إجمالي عمليات السحب &nbsp;&nbsp;&nbsp;<span style='color:red'>"
  . $getOutMoney[0]["sumAll"]."</span>&nbsp;&nbsp;"
  ."الحساب الحالي&nbsp;&nbsp;<span style='color:red'>".($getPutMoney[0]["sumAll"] - $getOutMoney[0]["sumAll"]);?>
</span>
  </p>

</div>
</div>
