<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\Inventory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-form panel panel-default" style="margin-top:15px;">
  <div class="panel-heading" style="margin-bottom:16px;"><h3><span class="fa fa-ambulance  pad"
    style="    margin-top: 12px;
    margin-bottom: 7px;"></span>إضافة كمية من صنف للمخزن</h3></div>

   <?php $form = ActiveForm::begin(); ?>

 <div class="col-md-1">

 </div>
   <div class="col-md-4 inner-addon right-addon">
     <i class="glyphicon glyphicon-pencil"></i>
    <?= $form->field($model, 'item_qty')->textInput(['autocomplete' => "off"]) ?>
</div>

  <div class="col-md-6">
     <?= $form->field($model, 'item_name')->widget(Select2::classname(), [
    'data'          => ArrayHelper::map(\app\models\Inventory::find()->all(),
            'item_id','item_name'),
    'size'          => Select2::LARGE,
    'options'       => ['placeholder' => '... حدد الصنف'],
    'pluginOptions' => [
        'allowClear' => true,
    ],
]);
?>

   </div>


   <div class="form-group" >
       <?= Html::submitButton('<span class="glyphicon glyphicon-log-in pad"></span>إضافة كمية جديدة', ["style"=>"margin-right:80px;" ,'class' => 'btn btn-outline-danger']) ?>

   </div>


   <?php ActiveForm::end(); ?>

 </div>
