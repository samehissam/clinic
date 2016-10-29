<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\EmpLoanBackSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emp Loan Backs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="emp-loan-back-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Emp Loan Back', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'loan_back_id',
            'loan_back_cost',
            'back_date',
            'employe_employe_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
