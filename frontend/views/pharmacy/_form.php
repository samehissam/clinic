<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pharmacy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pharmacy-form  panel panel-default" style="margin-top:15px;">
  <div class="panel-heading" style="margin-bottom:16px;"><h3><span class="fa fa-ambulance pad" style="    margin-top: 12px;
    margin-bottom: 7px;"></span>إضافة صيدلية أو مركز للمستلزمات الطبية </h3></div>

    <?php $form = ActiveForm::begin(); ?>



    <div class=" inner-addon right-addon" style="margin:0 16px">
      <i class="glyphicon glyphicon-pencil"></i>
    <?= $form->field($model, 'pharmacy_name')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="form-group" style="margin-right:16px;">
    <?= Html::submitButton('<span class=" fa fa-ambulance pad"></span>إضافة الصيدلية', ['class' => 'btn btn-outline-primary']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>
