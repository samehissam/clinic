<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EmployeLoan */

$this->title = $model->loan_id;
$this->params['breadcrumbs'][] = ['label' => 'Employe Loans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employe-loan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'loan_id' => $model->loan_id, 'employe_employe_id' => $model->employe_employe_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'loan_id' => $model->loan_id, 'employe_employe_id' => $model->employe_employe_id], [
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
            'loan_id',
            'loan_cost',
            'loan_date',
            'employe_employe_id',
        ],
    ]) ?>

</div>
