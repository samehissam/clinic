<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $model app\models\InclubationHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="inclubation-history-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_qty')->textInput() ?>


    <?= $form->field($inventory, 'inventory_item_id')->widget(Select2::classname(), [
   'data'          => ArrayHelper::map(\app\models\Inventory::find()->all(),
           'item_id','item_name'),
   'size'          => Select2::LARGE,
   'options'       => ['placeholder' => '... حدد الصنف'],
   'pluginOptions' => [
       'allowClear' => true,
   ],
]);
?>

  <!--****************************set state in patient to get
                    in patient only to select from *********************** -->
    <?= $form->field($model, 'patient_patient_id')->widget(Select2::classname(), [
   'data'          => ArrayHelper::map(\app\models\Patient::find()->all(),
           'patient_id','patient_name'),
   'size'          => Select2::LARGE,
   'options'       => ['placeholder' => '... حدد المريض'],
   'pluginOptions' => [
       'allowClear' => true,
   ],
]);
?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
