<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pharmacy */

$this->title = 'Update Pharmacy: ' . $model->pharmacy_id;
$this->params['breadcrumbs'][] = ['label' => 'Pharmacies', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pharmacy_id, 'url' => ['view', 'id' => $model->pharmacy_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pharmacy-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
