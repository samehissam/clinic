<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\InventorySearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inventory-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'item_id') ?>

    <?= $form->field($model, 'item_name') ?>

    <?= $form->field($model, 'item_buyPrice') ?>

    <?= $form->field($model, 'item_qty') ?>

    <?= $form->field($model, 'in_date') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
