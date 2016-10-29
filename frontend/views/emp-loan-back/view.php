<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EmpLoanBack */

$this->title = $model->loan_back_id;
$this->params['breadcrumbs'][] = ['label' => 'Emp Loan Backs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-loan-back-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->loan_back_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->loan_back_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'loan_back_id',
            'loan_back_cost',
            'back_date',
            'employe_employe_id',
        ],
    ]) ?>

</div>
