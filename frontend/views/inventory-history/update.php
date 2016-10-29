<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryHistory */

$this->title = 'Update Inventory History: ' . $model->inventory_history_id;
$this->params['breadcrumbs'][] = ['label' => 'Inventory Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->inventory_history_id, 'url' => ['view', 'id' => $model->inventory_history_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventory-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
