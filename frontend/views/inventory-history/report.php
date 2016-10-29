<?php
$this->title = "تقرير الفواتير";
$connection=\Yii::$app->db;
$getItem = $connection->createCommand('SELECT item_name  FROM inventory ')->queryAll();
$getStock = $connection->createCommand('SELECT stock_name  FROM stock_type ')->queryAll();

?>

<div ng-app="myApp" ng-controller="inventoryHistoryReportCtrl">
<div class="total" style="margin-top:4px; height:60px;">
  <button type="button"  onclick="printDiv('report')" name="button" class="btn1 btn-danger" style="    float: left;
    margin-right: 11px;
    margin-left: 11px;"><i class="fa fa-print"></i></button>
 <div class="col-md-4">
   <select id="stock_select"  class="form-control"
   name="name" ng-model="filter.stock" required="true">
  <option value=""></option>

  <?php
  $e=0;


  while($e<count($getStock)) {
echo "<option value='".$getStock[$e]["stock_name"]."'>" .$getStock[$e]["stock_name"].'</option>';
   $e++;
  }
  ?>
  </select>
 </div>

 <div class="col-md-2">
   <input type="text"  class="form-control" name="qty" ng-model="filter.qty"
   autocomplete="off"  placeholder="الكــمـــية" >
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
           <p class="total text-center space">جرد المخزن الرئيسي


           </p>
          <table id="example" class="table table-striped table-bordered">
              <thead class="color">
      <tr>
        <th>إسم الصنف</th>
        <th>الكــمــــية</th>
        <th>نوع المخزن</th>
        <th>تاريخ الخروج</th>



      </tr>
    </thead>
   <tr ng-repeat="item in data |filter:{item_name:filter.name} |filter:{item_qty:filter.qty}
   |filter:{stock_name:filter.stock}  |filter:{item_buyPrice:filter.price} ">
     <td>{{item.item_name}}</td>
     <td>{{item.item_qty}}</td>

     <td>{{item.stock_name}}</td>
     <td>{{item.history_date}}</td>
<!-- |filter:{barcode:filter.barcode} | filter:{order_qty:filter.qty}|filter:{invoice_id:filter.invoic} |filter:{model:model} -->



   </tr>
 </table>
</div>
</div>
