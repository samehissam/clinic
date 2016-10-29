<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\PharmacyNeeds */

$this->title = 'Update Pharmacy Needs: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pharmacy Needs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="pharmacy-needs-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
