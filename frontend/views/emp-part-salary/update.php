<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EmpPartSalary */

$this->title = 'Update Emp Part Salary: ' . $model->part_id;
$this->params['breadcrumbs'][] = ['label' => 'Emp Part Salaries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->part_id, 'url' => ['view', 'id' => $model->part_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="emp-part-salary-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
