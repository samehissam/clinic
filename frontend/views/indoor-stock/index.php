<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\IndoorStockSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Indoor Stocks';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indoor-stock-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Indoor Stock', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stock_id',
            'item_qty',
            'inventory_item_id',
            'in_date',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
