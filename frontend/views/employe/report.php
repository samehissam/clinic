<?php
$this->title = "تقرير العاملين";

?>

<div ng-app="myApp" ng-controller="empReportCtrl">
  <button type="button"  onclick="printPart('report')"  name="button" class="btn1 btn-danger" style="    float: left;
    margin-right: 11px;
    margin-left: 11px;"><i class="fa fa-print"></i></button>
      <div class="row" id="report">
        <p class="total text-center space">تقرير العاملين
        </p>

          <table class="table table-bordered">
              <thead class="color">
      <tr>
        <th>إسم الموظف</th>
        <th>رقم الفون</th>
        <th>العنوان</th>
        <th>قيمة ساعة العمل</th>
        <th>تعديل </th>



      </tr>
    </thead>

   <tr ng-repeat="item in data ">
     <td>{{item.employe_name}}</td>
     <td>{{item.employe_phone}}</td>
     <td>{{item.employe_address}}</td>


     <td>{{item.employe_hourPrice}}</td>
<!-- |filter:{barcode:filter.barcode} | filter:{order_qty:filter.qty}|filter:{invoice_id:filter.invoic} |filter:{model:model} -->

<td>

		<a style="margin-right:16px;"href='/clinic/frontend/web/index.php?r=employe/update&id={{item.employe_id}}'><span class="glyphicon glyphicon-pencil" ></span> </a>

	</td>

   </tr>
 </table>


</div>
</div>
