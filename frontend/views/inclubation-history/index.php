<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\InclubationHistorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inclubation Histories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inclubation-history-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Inclubation History', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'stock_history_id',
            'item_qty',
            'history_date',
            'incubation_stock_stock_id',
            'patient_patient_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
