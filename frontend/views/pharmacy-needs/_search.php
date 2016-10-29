<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\PharmacyNeedsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pharmacy-needs-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'item_name') ?>

    <?= $form->field($model, 'in_date') ?>

    <?= $form->field($model, 'buy_cost') ?>

    <?= $form->field($model, 'item_qty') ?>

    <?php // echo $form->field($model, 'pharmacy_pharmacy_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
