<?php
$this->title = "تقرير الفواتير";
$connection=\Yii::$app->db;

$getEmploye= $connection->createCommand('SELECT *  FROM employe ')->queryAll();

?>

<div ng-app="myApp" ng-controller="empSalaryCtrl">
<div class="total" style="margin-top:4px; height:60px;">
  <button  type="button" name="button" class="btn1 btn-danger" onclick="printDiv('report')"  style="    float: left;
    margin-right: 11px;
    margin-left: 11px;"><i class="fa fa-print"></i></button>
    <button ng-click="cal()" type="button"name="button" class="btn1 btn-danger" style="    float: left;
      margin-right: 11px;
      margin-left: 11px;"><i class="fa fa-money"></i></button>
    <div class="col-md-4">
      <select id="employe_select"  class="need-check form-control"
      name="employe" ng-model="employe_id" required="true">
     <option value="">حدد الموظف</option>

     <?php
     $e=0;


     while($e<count($getEmploye)) {
    echo "<option value='".$getEmploye[$e]["employe_id"]."'>" .$getEmploye[$e]["employe_name"].'</option>';
      $e++;
     }
     ?>
     </select>
    </div>
    <div class="col-md-4">
      <select id="month_select"  class="need-check form-control"
      name="month" ng-model="month" required="true">
     <option value="">حدد الشهر</option>
     <option value="01">يناير</option>
     <option value="02">فبراير</option>
     <option value="03">مارس</option>
     <option value="04">أبريل</option>
     <option value="05">مايو</option>
     <option value="06">يونيو</option>
     <option value="07">يوليو</option>
     <option value="08">أعسطس</option>
     <option value="09">سبتمبر</option>
     <option value="10">أكتوبر</option>
     <option value="11">نوفمبر</option>
     <option value="12">ديسمبر</option>


     </select>
    </div>
</div>







<div class="clearfix"></div>
<div class="col-md-3">

</div>
      <div class="row col-md-6" id="report">
        <?='   <p class="total text-center space"> تقرير الموظف &nbsp;&nbsp;'."  {{empName(data)}}"?>
           </p>
          <table class="table table-bordered">
              <thead class="color">
      <tr>
        <!-- <th>إسم الطبيب</th> -->
        <!-- <th>إسم الصنف</th>
        <th>الكــمــــية</th>
        <th>سعر الوحدة</th>
        <th>الاجمالي</th>
        <th>تاريخ الخروج</th> -->



      </tr>
    </thead>

   <tr ng-repeat="item in data |filter:{item_name:filter.name} | filter:{item_qty:filter.qty} |filter:{doctor_name:filter.doctor}">
     <td>
       المبلغ المستقطع
     </td>
     <td>{{item.sum_salary}}</td>
     <!-- <td>{{item.item_name}}</td>
     <td>{{item.item_qty}}</td>

     <td>{{item.item_cost}}</td>
     <td>
       {{item.item_qty*item.item_cost}}
     </td>

     <td>{{item.out_date}}</td> -->
<!-- |filter:{barcode:filter.barcode} | filter:{order_qty:filter.qty}|filter:{invoice_id:filter.invoic} |filter:{model:model} -->



   </tr>
 </table>
 <!-- <p class="total text-center space" ng-if="doctor">إجمالي المستلزمات  =  {{calcNeed(data)}} جنيه

 </p> -->
</div>
</div>
