<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;



/* @var $this yii\web\View */
/* @var $model app\models\PharmacyNeeds */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pharmacy-needs-form  panel panel-default" style="margin-top:15px;">
    <div class="panel-heading" style="margin-bottom:16px;"><h3><span class="fa fa-ambulance pad" style="    margin-top: 12px;
      margin-bottom: 7px;"></span>إضافة مشتريات من صيدلية أو مركز للمستلزمات الطبية  </h3></div>

    <?php $form = ActiveForm::begin(); ?>
<div class="margin-form">

  <div class="col-md-6 inner-addon right-addon">
    <i class="glyphicon glyphicon-pencil"></i>
    <?= $form->field($model, 'item_name')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="col-md-6 inner-addon right-addon">
    <i class="glyphicon glyphicon-euro"></i>
    <?= $form->field($model, 'buy_cost')->textInput(['maxlength' => true]) ?>
  </div>
  <div class="clearfix">  </div>

  <div class="col-md-6 inner-addon right-addon">
    <i class="glyphicon glyphicon-pencil"></i>
    <?= $form->field($model, 'item_qty')->textInput() ?>
  </div>
  <div class="col-md-6 inner-addon right-addon">
    
    <?= $form->field($model, 'pharmacy_pharmacy_id')->widget(Select2::classname(), [
   'data'          => ArrayHelper::map(\app\models\Pharmacy::find()->all(),
           'pharmacy_id','pharmacy_name'),
   'size'          => Select2::LARGE,
   'options'       => ['placeholder' => '... حدد الصيدلية أو المركز'],
   'pluginOptions' => [
       'allowClear' => true,
   ],
]);?>
  </div>
  <div class="form-group">
    <?= Html::submitButton('<span class="glyphicon glyphicon-euro pad"></span>إضافة المشتريات ', ['class' => 'btn btn-outline-primary']) ?>
  </div>

</div>
    <?php ActiveForm::end(); ?>

</div>
