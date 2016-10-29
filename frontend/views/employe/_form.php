<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Employe */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employe-form  panel panel-default" style="margin-top:15px;">
  <div class="panel-heading" style="margin-bottom:16px;"><h3><span class=" glyphicon glyphicon-user pad" style="    margin-top: 12px;
    margin-bottom: 7px;"></span>إضافة موظف جديد</h3></div>


    <?php $form = ActiveForm::begin(); ?>
<div class="col-md-6 inner-addon right-addon">
  <i class="glyphicon glyphicon-phone"></i>
    <?= $form->field($model, 'employe_phone')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-6 inner-addon right-addon">
  <i class="glyphicon glyphicon-user"></i>
  <?= $form->field($model, 'employe_name')->textInput(['maxlength' => true,'autocomplete'=>"off",'autofocus'=>true]) ?>
</div>
 <div class="clearfix"></div>
<div class="col-md-6 inner-addon right-addon">
  <i class="glyphicon glyphicon-euro" ></i>

    <?= $form->field($model, 'employe_hourPrice')->textInput(['maxlength' => true]) ?>
</div>
<div class="col-md-6 inner-addon right-addon">
    <i class="glyphicon glyphicon-home"></i>
  <?= $form->field($model, 'employe_address')->textInput(['maxlength' => true]) ?>
</div>
    <div class="form-group" style="margin-right:16px;" >
        <?= Html::submitButton($model->isNewRecord ?'<span class="glyphicon glyphicon-user pad"></span>إضافة موظف جديد':'<span class="glyphicon glyphicon-user  pad"></span>تعديل', ['class' =>$model->isNewRecord ? 'btn btn-outline-primary':'btn btn-outline-danger']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>
