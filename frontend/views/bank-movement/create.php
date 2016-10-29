<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BankMovement */

$this->title = 'تحركات البنك';

?>
<div class="bank-movement-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
