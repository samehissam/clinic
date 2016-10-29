<?php
$this->title = "تقرير الفواتير";

?>

<div ng-app="myApp" ng-controller="inventoryReportCtrl">
<div class="total" style="margin-top:4px; height:60px;">
  <button type="button" id="prints" onclick="printDiv('report')" name="button" class="btn1 btn-danger" style="    float: left;
    margin-right: 11px;
    margin-left: 11px;"><i class="fa fa-print"></i></button>
 <div class="col-md-3">
   <input type="text" class="form-control" name="price"
   ng-model="filter.price" autocomplete="off" placeholder="سعر الشراء ">
 <span class="fa fa-search errspan"></span>
 </div>

 <div class="col-md-3">
   <input type="text"  class="form-control" name="qty" ng-model="filter.qty"
   autocomplete="off"  placeholder="الكــمـــية" maxlength=13>
   <span class="fa fa-search errspan"></span>
 </div>


 <div class="col-md-5">
 <select  id="item_select" class="form-control"
 name="name" ng-model="filter.name" required="true" autofocus=true>
<option value=""></option>


 <option  ng-repeat="item in data" value="{{item.item_name}}">{{item.item_name}}</option>
 <!-- <option ng-repeat="option in data.availableOptions" value="{{option.id}}">{{option.name}}</option> -->

</select>
 </div>
</div>



<div class="clearfix"></div>

      <div class="row" id="report">

           <p class="total text-center space">جرد المخزن الرئيسي


           </p>
          <table class="table table-striped table-bordered">
              <thead class="color">
      <tr>
        <th>إسم الصنف</th>
        <th>الكــمــــية</th>
        <th>سعر الشراء</th>



      </tr>
    </thead>
   <tr ng-repeat="item in data |filter:{item_name:filter.name} |filter:{item_qty:filter.qty} |filter:{item_buyPrice:filter.price} ">
     <td>{{item.item_name}}</td>
     <td>{{item.item_qty}}</td>

     <td>{{item.item_buyPrice}}</td>
<!-- |filter:{barcode:filter.barcode} | filter:{order_qty:filter.qty}|filter:{invoice_id:filter.invoic} |filter:{model:model} -->



   </tr>
 </table>

</div>
</div>
