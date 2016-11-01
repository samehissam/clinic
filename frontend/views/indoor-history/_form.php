<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\InclubationHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inclubation-history-form panel-default" style="margin-top:15px;">
  <div class="panel-heading" style="margin-bottom:16px;"><h3><span class="glyphicon glyphicon-log-out  pad"
    style="    margin-top: 12px;
    margin-bottom: 7px;"></span>خروج مستلزمات لمريض</h3></div>

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-3 inner-addon right-addon">
      <i class="glyphicon glyphicon-pencil" ></i>
    <?= $form->field($model, 'item_qty')->textInput()->label('الكــمــية') ?>
</div>
<div class="col-md-5 ">
    <?= $form->field($inventory, 'inventory_item_id')->label('إسم الصنف')->widget(Select2::classname(), [
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
<div class="col-md-4 ">
  <!--****************************set state in patient to get
                    in patient only to select from *********************** -->
    <?= $form->field($model, 'patient_patient_id')->label('حدد المريض')->widget(Select2::classname(), [
   'data'          => ArrayHelper::map(\app\models\Patient::find()->all(),
           'patient_id','patient_name'),
   'size'          => Select2::LARGE,
   'options'       => ['placeholder' => '... حدد المريض'],
   'pluginOptions' => [
       'allowClear' => true,
   ],
]);
?>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ?'<span class="glyphicon glyphicon-log-out  pad"></span>خروج صنف':'<span class="glyphicon glyphicon-pencil  pad"></span> تعديل', ['class' =>$model->isNewRecord ? 'btn btn-outline-primary':'btn btn-outline-danger']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
