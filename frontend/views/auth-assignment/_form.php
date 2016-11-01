<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model app\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-assignment-form panel panel-default" style="margin-top:15px;">
  <div class="panel-heading" style="margin-bottom:16px;"><h3>
    <span class=" glyphicon glyphicon-user pad" style="    margin-top: 12px;
    margin-bottom: 7px;"></span>تعديل الصلاحيات</h3></div>


    <?php $form = ActiveForm::begin(); ?>



    <div class="col-md-3"></div>
    <div class="col-md-6">
    <?= $form->field($model, 'user_id')->label("")->widget(Select2::classname(), [
    'data'          => ArrayHelper::map(\app\models\User::find()->all(),
           'id','username'),
    'size'          => Select2::LARGE,
    'options'       => ['placeholder' => '... حدد إسم المستخدم'],
    'pluginOptions' => [
       'allowClear' => true,
    ],
    ]);
    ?>
  </div>
<div class="clearfix">

</div>


    <div class="form-group" style="margin-right:230px;">
        <?= Html::submitButton($model->isNewRecord ? 'إضافة صلاحية الأدمن' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-outline-danger' : 'btn btn-primary']) ?>

        <?= Html::a('إلغاء الصلاحية', ['remove'], [
        'class' => 'btn btn-outline-primary',
        'data' => [

            'method' => 'post',
        ],
    ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
