<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InclubationHistory */

$this->title = 'Update Inclubation History: ' . $model->stock_history_id;
$this->params['breadcrumbs'][] = ['label' => 'Inclubation Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->stock_history_id, 'url' => ['view', 'id' => $model->stock_history_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inclubation-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
