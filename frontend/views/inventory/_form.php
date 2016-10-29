<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\Inventory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-form panel panel-default" style="margin-top:15px;">
  <div class="panel-heading" style="margin-bottom:16px;"><h3><span class="fa fa-ambulance  pad"
    style="    margin-top: 12px;
    margin-bottom: 7px;"></span>إضافة صنف جديد للمخزن</h3></div>
   <?php $form = ActiveForm::begin(); ?>

   <div class="col-md-3 inner-addon right-addon">
     <i class="glyphicon glyphicon-euro" ></i>
    <?= $form->field($model, 'item_buyPrice')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-md-3 inner-addon right-addon">
    <i class="glyphicon glyphicon-pencil" ></i>
    <?= $form->field($model, 'item_qty')->textInput() ?>

  </div>
  <div class="col-md-6 inner-addon right-addon">
    <i class="glyphicon glyphicon-pencil" ></i>
     <?= $form->field($model, 'item_name')->textInput(['maxlength' => true,'autocomplete'=>"off",'autofocus'=>true]) ?>
   </div>



    <!-- add dynamic-form -->
    <div class="clearfix"></div>





    <!--  dynamic-form end -->

    <div class="form-group" style="margin-right:16px;" >
        <?= Html::submitButton($model->isNewRecord ?'<span class="glyphicon glyphicon-log-in  pad"></span>إضافة صنف':'<span class="glyphicon glyphicon-pencil  pad"></span> تعديل', ['class' =>$model->isNewRecord ? 'btn btn-outline-primary':'btn btn-outline-danger']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
