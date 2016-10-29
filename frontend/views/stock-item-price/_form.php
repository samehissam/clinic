<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\StockItemPrice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="panel panel-default" style="margin-top:15px;">
  <div class="panel-heading" style="margin-bottom:16px;"><h3>
    <i class="fa fa-money"></i>
  إضافة سعر المستلزمات الطبية للجهات المختلفة</h3></div>
 <?php $form = ActiveForm::begin(); ?>
 <div class="col-md-3" style="margin-top:16px;">

       <?= Html::submitButton($model->isNewRecord ?'<span class="glyphicon glyphicon-euro pad"></span>إضافة ':'<span class="glyphicon glyphicon-pencil  pad"></span> تعديل', ['class' =>$model->isNewRecord ? 'btn btn-outline-primary':'btn btn-outline-danger']) ?>


 </div>
 <div class="col-md-3">
    <?= $form->field($model, 'stock_item_price')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-md-6">
<?= $form->field($model, 'patient_type_patient_type_id')->widget(Select2::classname(), [
'data'          => ArrayHelper::map(\app\models\PatientType::find()->all(),
       'patient_type_id','patient_type_name'),
'size'          => Select2::LARGE,
'options'       => ['placeholder' => '... حدد الجهة'],
'pluginOptions' => [
   'allowClear' => true,
],
]);
?>
</div>

<div class="clearfix">

</div>




    <?php ActiveForm::end(); ?>

  </div>
