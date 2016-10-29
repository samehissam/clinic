<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pharmacy */

$this->title = 'إضافة صيدلية أو مركز ';
?>
<div class="pharmacy-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
