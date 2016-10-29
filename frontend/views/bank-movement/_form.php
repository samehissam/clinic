<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datepicker\DatePicker;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\BankMovement */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bank-movement-form panel panel-default" style="margin-top:15px;">
    <div class="panel-heading" style="margin-bottom:16px;"><h3><span class="fa fa-bank pad" style="    margin-top: 12px;
      margin-bottom: 7px;"></span>تسجيل تحركات البنك  </h3></div>

    <?php $form = ActiveForm::begin(); ?>
<div class="margin-form">
  <div class="col-md-6 inner-addon right-addon">
    <i class="glyphicon glyphicon-euro"></i>
    <?= $form->field($model, 'money')->textInput(['maxlength' => true])->label("المبلغ") ?>
  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'transaction_date')->textInput(['autocomplete' => "off"])
    ->label("العملية اليوم")->widget(
    DatePicker::className(), [

        'language'      => 'es',
        'size'          => 'lg',
        'clientOptions' => [
            'autoclose' => true,
            'format'    => 'yyyy-mm-dd',

        ],
    ]);
?>
  </div>
  <div class="col-md-6">
    <?= $form->field($model, 'transaction_state')->label("نوع العملية")->widget(Select2::classname(), [
   'data'          => ArrayHelper::map(\app\models\TransactionType::find()->all(),
           'transaction_id','type_name'),
   'size'          => Select2::LARGE,
   'options'       => ['placeholder' => '... نوع العملية'],
   'pluginOptions' => [
       'allowClear' => true,
   ],
]);?>
  </div>



    <div class="col-md-6 inner-addon right-addon">
      <i class="glyphicon glyphicon-comment"></i>
    <?= $form->field($model, 'comment')->textInput(['maxlength' => true,'value'=>" "])->label("إضافة تعليق")?>
  </div>
  <div class="form-group">

    <?= Html::submitButton($model->isNewRecord ?'<span class="glyphicon glyphicon-euro pad"></span>إضافة التحركات':'<span class="glyphicon glyphicon-euro pad"></span>تعديل', ['class' =>$model->isNewRecord ? 'btn btn-outline-primary':'btn btn-outline-danger']) ?>
  </div>

    <?php ActiveForm::end(); ?>

</div>
</div>
