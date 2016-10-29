<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Employe */

$this->title = $model->employe_id;
$this->params['breadcrumbs'][] = ['label' => 'Employes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="employe-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->employe_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->employe_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'employe_id',
            'employe_name',
            'employe_phone',
            'employe_address',
            'employe_hourPrice',
        ],
    ]) ?>

</div>
