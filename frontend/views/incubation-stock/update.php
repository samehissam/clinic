<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IncubationStock */

$this->title = 'Update Incubation Stock: ' . $model->stock_id;
$this->params['breadcrumbs'][] = ['label' => 'Incubation Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stock_id, 'url' => ['view', 'stock_id' => $model->stock_id, 'inventory_item_id' => $model->inventory_item_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="incubation-stock-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
