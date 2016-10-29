<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
// or 'use kartikile\FileInput' if you have only installed yii2-widget-fileinput in isolation
use yii\helpers\Url;
// use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\product */
/* @var $form yii\widgets\ActiveForm */


?>



<div class="attendance-form well">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>"multipart/form-data"]]); ?>

    <?php
    // get the difference between two days
    $datetime1 = new DateTime('2014-02-11 04:04:26 AM');
    $datetime2 = new DateTime('2014-02-11 05:36:56 AM');
    $interval = $datetime1->diff($datetime2);
    echo $interval->format('%h')." Hours ".$interval->format('%i')." Minutes</br>";
    // how to get dayName for a spacific date
    $months = array(
    "" => "يناير",
    "Feb" => "فبراير",
    "Mar" => "مارس",
    "Apr" => "أبريل",
    "May" => "مايو",
    "Jun" => "يونيو",
    "Jul" => "يوليو",
    "Aug" => "أغسطس",
    "Sep" => "سبتمبر",
    "Oct" => "أكتوبر",
    "Nov" => "نوفمبر",
    "Dec" => "ديسمبر"
);
    $days = array(
    "Sat" => "السبت",
    "Sun" => "الأحد",
    "Mon" => "الاثنين",
    "Tue" => "الثلاثاء",
    "Wed" => "الأربعاء",
    "Thu" => "الخميس",
    "Fri" => "الجمعة"
);

$find = array ("Sat", "Sun", "Mon", "Tue", "Wed" , "Thu", "Fri");
   $replace = array ("السبت", "الأحد", "الإثنين", "الثلاثاء", "الأربعاء", "الخميس", "الجمعة");

  $en_day=  date("D", strtotime('2016-10-10 04:04:26 AM'));

$ar_day = $days[$en_day];

echo $en_day . " = " . $ar_day;
    ?>

    <?php


     // Usage with ActiveForm and model
     //change here: need to add image_path attribute from another table and add square bracket after image_path[] for multiple file upload.
      echo $form->field($model,'file' )->widget(FileInput::classname(), [
         'options' => ['multiple' => false, "accept"=>".XLSX","required"=>true ],
         'pluginOptions' => [
             'previewFileType' => 'any',
             //change here: below line is added just to hide upload button. Its up to you to add this code or not.
             'showUpload' => false
         ],
     ]);
     ?>



    <div class="form-group">
        <?= Html::submitButton( 'Add Product', ['class' => 'btn btn-outline-primary'],['add-attendance']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
