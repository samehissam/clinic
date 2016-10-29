<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;


use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $model app\models\DoctorNeeds */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="doctor-needs-form">
    

    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?php $now = date('Y/m/d');?>
    <div class="hidden">   <?= $form->Field( $model , "date" )->textInput(['value' =>$now ,'maxlength' => true]) ?>
    </div>


    <div class="marg panel panel-default">
        <div class="panel-heading"><h2><i class="glyphicon glyphicon-shopping-cart"></i> الطلبات</h2></div>
        <div class="panel-body">
    <?= $form->field($model, 'has_id')->widget(Select2::classname(), [
   'data'          => ArrayHelper::map(\app\models\Patient::find()->all(),
           'patient_id','patient_name'),
   'size'          => Select2::LARGE,
   'options'       => ['placeholder' => '... حدد الطبيب'],
   'pluginOptions' => [
       'allowClear' => true,
   ],
]);?>
            <?php DynamicFormWidget::begin([
                'widgetContainer' => 'dynamicform_wrapper', // required: only alphanumeric characters plus "_" [A-Za-z0-9_]
                'widgetBody' => '.container-items', // required: css class selector
                'widgetItem' => '.item', // required: css class
                'limit' => 100, // the maximum times, an element can be cloned (default 999)
                'min' => 1, // 0 or 1 (default 1)
                'insertButton' => '.add-item', // css class
                'deleteButton' => '.remove-item', // css class
                'model' => $doctor[0],
                'formId' => 'dynamic-form',
                'formFields' => [
                    'item_item_id',
                    'qty',
                    'method' => 'POST',
                ],
            ]); ?>

            <div class="container-items"><!-- widgetContainer -->

                <?php foreach ($doctor as $i => $doctor): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->


                        <div class="panel-body">
                            <?php
                            // necessary for update action.
                          /*  if (! $modelTransaction->isNewRecord) {
                                echo Html::activeHiddenInput($modelTransaction, "[{$i}]id");
                            }*/
                            ?>

                          <div class="col-sm-6">
                              <?= $form->field($doctor , "[{$i}]item_qty")
                              ->textInput(['onkeypress'=>"return isNumberKey(event)",'maxlength' => true,'autocomplete'=>"off",'style'=>'width:100px;margin-right:40px'])->label('الكمية',['style'=>'width:100px;margin-right:40px']) ?>

                          </div>

                      <div class=" col-sm-6">
                          <?= $form->field( $doctor , "[{$i}]inventory_item_id")
                          ->label('الصنف')
                          ->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Inventory::find()->all(),
                              'item_id','item_name'),['prompt'=>'اختر الصنف.....',
                              'class'=>'item_select','style'=>'width:300px; height:35px;'

                          ])?>
                      </div><!-- .row -->

                        </div>
                        <div class="pull-right up">
                            <button type="button" class=" add-item btn btn-primary btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                            <button type="button" class="remove-item btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>

                        </div>
                        <div class="clearfix"></div>

                    </div>
                <?php endforeach; ?>

        </div>

        <?php DynamicFormWidget::end(); ?>

    </div>

</div><!--dynamic form end-->




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
