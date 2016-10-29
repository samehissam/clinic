<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IndoorHistory */

$this->title = $model->indoor_history_id;
$this->params['breadcrumbs'][] = ['label' => 'Indoor Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indoor-history-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->indoor_history_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->indoor_history_id], [
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
            'indoor_history_id',
            'item_qty',
            'history_date',
            'indoor_stock_stock_id',
            'patient_patient_id',
        ],
    ]) ?>

</div>
