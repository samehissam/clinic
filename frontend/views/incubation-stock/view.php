<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\IncubationStock */

$this->title = $model->stock_id;
$this->params['breadcrumbs'][] = ['label' => 'Incubation Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incubation-stock-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'stock_id' => $model->stock_id, 'inventory_item_id' => $model->inventory_item_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'stock_id' => $model->stock_id, 'inventory_item_id' => $model->inventory_item_id], [
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
            'stock_id',
            'item_qty',
            'inventory_item_id',
            'in_date',
        ],
    ]) ?>

</div>
