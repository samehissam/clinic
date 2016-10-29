<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IndoorStock */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="indoor-stock-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_qty')->textInput() ?>

    <?= $form->field($model, 'inventory_item_id')->textInput() ?>

    <?= $form->field($model, 'in_date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
