<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\EmpLoanBackSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="emp-loan-back-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'loan_back_id') ?>

    <?= $form->field($model, 'loan_back_cost') ?>

    <?= $form->field($model, 'back_date') ?>

    <?= $form->field($model, 'employe_employe_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
