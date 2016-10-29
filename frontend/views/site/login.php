<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use kartik\form\ActiveForm;
//use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

$this->title = 'تسجيل الدخول ';

?>
<div class="row overlay">
  <h1 class="text-center" style="color: #0275d8; margin-top: 150px; font-size: 70px; font-weight: bold;">
    Baram <sub>براعـــــم</sub></h1>
<div class="col-lg-3"></div>
<div class="col-lg-5" style="margin-left: 50px;">

            <?php $form = ActiveForm::begin(['id' => 'login-form']);?>

<?php
echo $form->field($model, 'username')->label("")->widget(Select2::classname(), [
'data'          => ArrayHelper::map(\app\models\User::find()->all(),
       'username','username'),
'size'          => Select2::LARGE,
'options'       => ['placeholder' => '... حدد إسم المستخدم'],
'pluginOptions' => [
   'allowClear' => true,
],
]);
?>


<?php
echo $form->field($model, 'password', [
    'feedbackIcon' => [
        'prefix'         => 'fa fa-',
        'default'        => 'key',
        'success'        => 'unlock',
        'error'          => 'unlock-alt',
        'defaultOptions' => ['class' => 'text-warning'],
    ],
])->passwordInput(['placeholder' => 'كلمة السر ...'])->label("");

?>



                <div class="form-group">
                    <?=Html::submitButton('<span class=" glyphicon glyphicon-log-in pad"></span> دخول', ['class' => 'radius-button btn btn-primary btn-lg', 'name' => 'login-button'])?>
                </div>

            <?php ActiveForm::end();?>
    </div>
</div>
