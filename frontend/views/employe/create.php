<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Employe */

$this->title = 'إضافة موظف جديد';

?>
<div class="employe-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
