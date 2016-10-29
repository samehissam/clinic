<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DoctorNeedsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="doctor-needs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'need_id') ?>

    <?= $form->field($model, 'out_date') ?>

    <?= $form->field($model, 'item_qty') ?>

    <?= $form->field($model, 'item_cost') ?>

    <?= $form->field($model, 'inventory_item_id') ?>

    <?php // echo $form->field($model, 'doctor_doctor_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
