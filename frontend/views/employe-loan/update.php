<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeLoan */

$this->title = 'Update Employe Loan: ' . $model->loan_id;
$this->params['breadcrumbs'][] = ['label' => 'Employe Loans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->loan_id, 'url' => ['view', 'loan_id' => $model->loan_id, 'employe_employe_id' => $model->employe_employe_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="employe-loan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
