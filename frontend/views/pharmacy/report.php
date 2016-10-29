<?php
$this->title = "تقرير الفواتير";
$connection=\Yii::$app->db;
$getPharmacy = $connection->createCommand('SELECT pharmacy_name  FROM pharmacy ')->queryAll();


?>

<div ng-app="myApp" ng-controller="pharmacyReportCtrl">
<div class="total" style="margin-top:4px; height:60px;">
  <button type="button"  onclick="printDiv('report')" name="button" class="btn1 btn-danger" style="    float: left;
    margin-right: 11px;
    margin-left: 11px;"><i class="fa fa-print"></i></button>
 <div class="col-md-4">
   <select id="pharmacy_select"  class="form-control"
  name="pharmacy" ng-model="filter.pharmacy" required="true">
  <option value="">حدد الصيدلية / المركز</option>

  <?php
  $e=0;


  while($e<count($getPharmacy)) {
echo "<option value='".$getPharmacy[$e]["pharmacy_name"]."'>"
 .$getPharmacy[$e]["pharmacy_name"].'</option>';
   $e++;
  }
  ?>
  </select>
 </div>

 </div>



<div class="clearfix"></div>

      <div class="row" id="report">
        <p class="total text-center space">المعاملات مع الصيدليات والمراكز الطبية  </p>
          <table class="table table-striped table-bordered">
              <thead class="color">
      <tr>
        <th>إسم الصدلية / المركز</th>
        <th>إسم الصنف</th>
        <th>الكــمــــية</th>
        <th>سعر الوحدة</th>
        <th>الاجمالي</th>
        <th>تاريخ الخروج</th>



      </tr>
    </thead>

   <tr ng-repeat="item in data |filter:{pharmacy_name:filter.pharmacy} ">
     <td>{{item.pharmacy_name}}</td>
     <td>{{item.item_name}}</td>
     <td>{{item.item_qty}}</td>

     <td>{{item.buy_cost}}</td>
     <td>
       {{item.item_qty*item.buy_cost}}
     </td>

     <td>{{item.in_date}}</td>
<!-- |filter:{barcode:filter.barcode} | filter:{order_qty:filter.qty}|filter:{invoice_id:filter.invoic} |filter:{model:model} -->



   </tr>
 </table>

 </p>
</div>
</div>
