<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EmployeLoanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Employe Loans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employe-loan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Employe Loan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'loan_id',
            'loan_cost',
            'loan_date',
            'employe_employe_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
