<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\PharmacyNeedsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pharmacy Needs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pharmacy-needs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pharmacy Needs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'item_name',
            'in_date',
            'buy_cost',
            'item_qty',
            // 'pharmacy_pharmacy_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
