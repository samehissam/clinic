<?php
$this->title = "تقرير الفواتير";
$connection=\Yii::$app->db;
$getItem = $connection->createCommand('SELECT item_name  FROM inventory ')->queryAll();
$getDoctor= $connection->createCommand('SELECT *  FROM doctor ')->queryAll();

?>

<div ng-app="myApp" ng-controller="formCtrl">
<div class="total" style="margin-top:4px; height:60px;">
  <button ng-disabled="!(doctor)" type="button" onclick="printDiv('report')" name="button" class="btn1 btn-danger" style="    float: left;
    margin-right: 11px;
    margin-left: 11px;"><i class="fa fa-print"></i></button>

    <div class="col-md-4">
      <select id="doctor_select"  class="need-check form-control"
      name="patient" ng-model="doctor" required="true">
     <option value=""></option>

     <?php
     $e=0;


     while($e<count($getDoctor)) {
    echo "<option value='".$getDoctor[$e]["doctor_id"]."'>" .$getDoctor[$e]["doctor_name"].'</option>';
      $e++;
     }
     ?>
     </select>
    </div>
</div>







<div class="clearfix"></div>

      <div class="row" id="report">
        <?='   <p class="total text-center space"> المستلزمات الطبية للدكتور  &nbsp;&nbsp;' ."{{nameDoctor(data)}}"?>
           </p>
          <table class="table table-bordered">
              <thead class="color">
      <tr>
        <th>إسم الطبيب</th>
        <th>إسم الصنف</th>
        <th>الكــمــــية</th>
        <th>سعر الوحدة</th>
        <th>الاجمالي</th>
        <th>تاريخ الخروج</th>



      </tr>
    </thead>

   <tr ng-repeat="item in data |filter:{item_name:filter.name} | filter:{item_qty:filter.qty} |filter:{doctor_name:filter.doctor}">
     <td>{{item.doctor_name}}</td>
     <td>{{item.item_name}}</td>
     <td>{{item.item_qty}}</td>

     <td>{{item.item_cost}}</td>
     <td>
       {{item.item_qty*item.item_cost}}
     </td>

     <td>{{item.out_date}}</td>
<!-- |filter:{barcode:filter.barcode} | filter:{order_qty:filter.qty}|filter:{invoice_id:filter.invoic} |filter:{model:model} -->



   </tr>
 </table>
 <p class="total text-center space" ng-if="doctor">إجمالي المستلزمات  =  {{calcNeed(data)}} جنيه

 </p>
</div>
</div>
