<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\InclubationHistorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inclubation-history-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'stock_history_id') ?>

    <?= $form->field($model, 'item_qty') ?>

    <?= $form->field($model, 'history_date') ?>

    <?= $form->field($model, 'incubation_stock_stock_id') ?>

    <?= $form->field($model, 'patient_patient_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
