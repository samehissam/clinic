<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InventoryHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventory Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inventory History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'inventory_history_id',
            'item_qty',
            'history_date',
            'inventory_item_id',
            'stock_type_stock_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
