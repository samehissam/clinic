<?php
$this->title = "تقرير الفواتير";
$connection=\Yii::$app->db;
$getItem = $connection->createCommand('SELECT item_name  FROM inventory ')->queryAll();
$getDoctor= $connection->createCommand('SELECT doctor_name  FROM doctor ')->queryAll();

?>

<div ng-app="myApp" ng-controller="doctorsNeedsReportCtrl">
<div class="total" style="margin-top:4px; height:60px;">
  <button type="button" id="print" name="button" class="btn1 btn-danger" style="    float: left;
    margin-right: 11px;
    margin-left: 11px;"><i class="fa fa-print"></i></button>
 <div class="col-md-4">
   <select id="doctor_select"  class="form-control"
   name="patient" ng-model="filter.doctor" required="true">
  <option value=""></option>

  <?php
  $e=0;


  while($e<count($getDoctor)) {
echo "<option value='".$getDoctor[$e]["doctor_name"]."'>" .$getDoctor[$e]["doctor_name"].'</option>';
   $e++;
  }
  ?>
  </select>
 </div>

 <div class="col-md-2">
   <input type="text"  class="form-control" name="qty" ng-model="filter.qty"
   autocomplete="off"  placeholder="الكــمـــية" maxlength=13>
   <span class="fa fa-search errspan"></span>
 </div>


 <div class="col-md-5">
 <select  id="item_select" class="form-control"
 name="name" ng-model="filter.name" required="true" autofocus=true>
<option value=""></option>

<?php
$e=0;


   while($e<count($getItem)) {
 echo "<option value='".$getItem[$e]["item_name"]."'>" .$getItem[$e]["item_name"].'</option>';
 $e++;
}
?>
</select>
 </div>
</div>



<div class="clearfix"></div>

      <div class="row" id="report">
        <?='   <p class="total text-center space">جرد المستلزمات الطبية للأطباء &nbsp;&nbsp;' . date("d/m/Y")?>
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
 <p class="total text-center space">إجمالي المستلزمات  =  {{calcAll(data)}} جنيه

 </p>
</div>
</div>
