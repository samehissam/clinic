<?php

use yii\helpers\Html;



/* @var $this yii\web\View */
/* @var $model app\models\Attendance */

$this->title = 'Create Attendance';

?>
<div class="attendance-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
