<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EmployeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="employe-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'employe_id') ?>

    <?= $form->field($model, 'employe_name') ?>

    <?= $form->field($model, 'employe_phone') ?>

    <?= $form->field($model, 'employe_address') ?>

    <?= $form->field($model, 'employe_hourPrice') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
