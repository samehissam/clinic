<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\PharmacyNeeds */

$this->title = 'تسجيل مشتريات الصيدليات';

?>
<div class="pharmacy-needs-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
