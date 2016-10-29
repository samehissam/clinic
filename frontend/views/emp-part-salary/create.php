<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EmpPartSalary */

$this->title = 'تسجيل المبالغ المستقطعة';

?>
<div class="emp-part-salary-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
