<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorNeeds */

$this->title = 'Update Doctor Needs: ' . $model->need_id;
$this->params['breadcrumbs'][] = ['label' => 'Doctor Needs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->need_id, 'url' => ['view', 'id' => $model->need_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="doctor-needs-update">



    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        
    ]) ?>

</div>
