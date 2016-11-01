<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AuthAssignment */

$this->title = 'إضافة صلاحية';

?>
<div class="auth-assignment-create">

    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
