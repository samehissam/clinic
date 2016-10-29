<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\AttendanceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Attendances';

?>
<div class="attendance-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::Button('Create Attendance',  ['value'=>Url::to('index.php?r=attendance/add'), 'class' => 'btn btn-success']) ?>
    </p>

    <?php
        Modal::begin([

          'header'=>'Attendance report',
          'id'=>'modal',
          'size'=>'modal-md',
        ]);
        echo "<div id='modalContent'></div>";
        Modal::end();
     ?>
</div>
