<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\IndoorHistory */

$this->title = 'Update Indoor History: ' . $model->indoor_history_id;
$this->params['breadcrumbs'][] = ['label' => 'Indoor Histories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->indoor_history_id, 'url' => ['view', 'id' => $model->indoor_history_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="indoor-history-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
