<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DoctorNeedsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Doctor Needs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="doctor-needs-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Doctor Needs', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'need_id',
            'out_date',
            'item_qty',
            'item_cost',
            'inventory_item_id',
            // 'doctor_doctor_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
