<?php


use kartik\form\ActiveForm;
//use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'تسجيل مسنخدم ';

?>
<div class="row overlay">
  <h1 class="text-center" style="color: #0275d8; margin-top: 150px; font-size: 70px; font-weight: bold;">
    Baram <sub>براعـــــم</sub></h1>
<div class="col-lg-3"></div>
<div class="col-lg-5" style="margin-left: 50px;">

            <?php $form = ActiveForm::begin(['id' => 'login-form']);?>

<?php
echo $form->field($model, 'username', [
    'feedbackIcon' => [
        'prefix'         => 'fa fa-',
        'default'        => 'user',
        'success'        => 'user-plus',
        'error'          => 'user-times',
        'defaultOptions' => ['class' => 'text-warning'],
    ],
])->textInput(['placeholder' => 'إسم المستخدم ...','autofocus'=>true])->label("");
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
                    <?=Html::submitButton('<span class=" glyphicon glyphicon-user pad"></span> دخول', ['class' => 'radius-button btn btn-primary btn-lg', 'name' => 'login-button'])?>
                </div>

            <?php ActiveForm::end();?>
    </div>
</div>
