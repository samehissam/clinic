<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmpLoanBack */

$this->title = 'Update Emp Loan Back: ' . $model->loan_back_id;
$this->params['breadcrumbs'][] = ['label' => 'Emp Loan Backs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->loan_back_id, 'url' => ['view', 'id' => $model->loan_back_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emp-loan-back-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
