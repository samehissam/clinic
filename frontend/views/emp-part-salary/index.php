<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EmpPartSalarySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emp Part Salaries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-part-salary-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Emp Part Salary', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'part_id',
            'part_cost',
            'part_date',
            'employe_employe_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
