<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeLoan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employe-loan-form  panel panel-default" style="margin-top:15px;">
  <div class="panel-heading" style="margin-bottom:16px;"><h3>
    <span class=" glyphicon glyphicon-euro pad" style="    margin-top: 12px;
    margin-bottom: 7px;"></span>إضافة سلفة جديدة</h3></div>

    <?php $form = ActiveForm::begin(); ?>
    <div class="col-md-6 inner-addon right-addon">
      <i class="glyphicon glyphicon-euro" ></i>
    <?= $form->field($model, 'loan_cost')->textInput(['maxlength' => true]) ?>
</div>

<div class="col-md-6">
    <?= $form->field($model, 'employe_employe_id')->widget(Select2::classname(), [
   'data'          => ArrayHelper::map(\app\models\Employe::find()->all(),
           'employe_id','employe_name'),
   'size'          => Select2::LARGE,
   'options'       => ['placeholder' => '... حدد الموظف'],
   'pluginOptions' => [
       'allowClear' => true,
   ],

]);
?>
</div>
<div class="form-group" style="margin-right:16px;" >
    <?= Html::submitButton($model->isNewRecord ?'<span class="glyphicon glyphicon-euro pad"></span>إضافة سلفة':'<span class="glyphicon glyphicon-euro  pad"></span>تعديل السلفة', ['class' =>$model->isNewRecord ? 'btn btn-outline-primary':'btn btn-outline-danger']) ?>

</div>


    <?php ActiveForm::end(); ?>

</div>
