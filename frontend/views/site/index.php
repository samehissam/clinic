<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'Baram براعـــــم';
?>
<div class="row overlay index">


<h1 class="text-center" style="color: #0275d8; margin-top: 150px; font-size: 70px; font-weight: bold;">
  Baram <sub>براعـــــم</sub></h1>
<div class="col-md-3"></div>
<div class="col-md-6">
  <?= Html::a('<span class="glyphicon glyphicon-euro pad"></span>الـكـــشــف', ['/orders/create'], ['class'=>'btn btn-danger ', 'target'=>'_blank']) ?>
  <?= Html::a(' <span class="glyphicon glyphicon-user pad"></span>العاملين', ['/orders/order-report'], ['class'=>'btn btn-primary', 'target'=>'_blank']) ?>
  <?= Html::a(' <span class="fa fa-bank pad"></span> المخزن', ['/expenses/ask'], ['class'=>'btn btn-info', 'target'=>'_blank'])?>


  <p class="lead text-center" style="color: #0275d8; margin-top: 35px;  font-weight: bold;" >
     Developed By : <a style="text-decoration: none; color:#0275d8;" href="https://www.facebook.com/sammeh.mourad" target="_blank"> Sameh & Mahmoud &copy;</a></p>

  <p class="lead text-center" style="color: #0275d8; margin-top: 10px;  font-weight: bold;" >01147136752   &nbsp; <i style="margin-left:10px; " class="fa fa-phone" aria-hidden="true"></i>
    01011415297  &nbsp; <i class="fa fa-phone" aria-hidden="true"></i></p>

</div>
<div  class="clr"></div>
<div class="col-md-2"></div>
<div class="col-md-6" style="margin-top:10px;">
	<a href="https://www.facebook.com/sammeh.mourad" target="_blank"> <button class="ui facebook button">
       <i class="fa fa-facebook-square" aria-hidden="true"></i>
        Sameh
    </button></a>


    <a href="https://www.facebook.com/%D8%A7%D8%B2%D9%8A-%D9%83%D8%A7%D8%B4%D9%8A%D8%B1-%D9%85%D8%B7%D8%A7%D8%B9%D9%85-%D9%83%D8%A7%D9%81%D9%8A%D9%87%D8%A7%D8%AA-%D9%85%D8%AD%D9%84%D8%A7%D8%AA-%D8%AA%D8%AC%D8%A7%D8%B1%D9%8A%D8%A9-1644063212533553/" target="_blank"> <button class="ui facebook button">
        <i class="fa fa-facebook-square" aria-hidden="true"></i>
        للتواصل معنا
    </button></a>
</div>
<img src="/clinic/frontend/web/images/logo.jpg"
    style="position: absolute; top: 30px; left: 70px; "/>




</div>
