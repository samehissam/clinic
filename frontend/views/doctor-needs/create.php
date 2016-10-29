<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\DoctorNeeds */

$this->title = 'Create Doctor Needs';

?>
<div class="doctor-needs-create">


    <?= $this->render('_form', [
        'model' => $model,
        'doctor' => $doctor
    ]) ?>

</div>
