<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BankMovement */

$this->title = $model->movement_id;
$this->params['breadcrumbs'][] = ['label' => 'Bank Movements', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bank-movement-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->movement_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->movement_id], [
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
            'movement_id',
            'money',
            'transaction_date',
            'transaction_state',
            'comment',
        ],
    ]) ?>

</div>
