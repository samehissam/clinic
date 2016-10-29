<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\IncubationStockSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="incubation-stock-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'stock_id') ?>

    <?= $form->field($model, 'item_qty') ?>

    <?= $form->field($model, 'inventory_item_id') ?>

    <?= $form->field($model, 'in_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
