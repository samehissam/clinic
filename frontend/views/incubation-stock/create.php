<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IncubationStock */

$this->title = 'Create Incubation Stock';
$this->params['breadcrumbs'][] = ['label' => 'Incubation Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="incubation-stock-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
