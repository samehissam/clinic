<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BankMovement */

$this->title = ' تعديل التحركات'
?>
<div class="bank-movement-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
