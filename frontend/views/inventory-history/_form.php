<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
/* @var $this yii\web\View */
/* @var $model app\models\InventoryHistory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class=" panel panel-default" style="margin-top:15px;">
  <div class="panel-heading" style="margin-bottom:16px;"><h3>
    <i class="fa fa-shopping-cart"></i> خروج مستلزمات طبية من المخزن الرئيسي</h3></div>

<div class="inventory-history-form" style="margin-top:30px;">
    <?php $form = ActiveForm::begin(); ?>


   <div class="col-md-5">
    <?= $form->field($model, 'stock_type_stock_id')->widget(Select2::classname(), [
   'data'          => ArrayHelper::map(\app\models\StockType::find()->all(),
           'stock_id','stock_name'),
   'size'          => Select2::LARGE,
   'options'       => ['placeholder' => '... حدد المخزن'],
   'pluginOptions' => [
       'allowClear' => true,
   ],
]);
?>
  </div>
  <div class="col-md-2">
     <?= $form->field($model, 'item_qty')->textInput() ?>
   </div>
   <div class="col-md-5">
    <?= $form->field($model, 'inventory_item_id')->widget(Select2::classname(), [
   'data'          => ArrayHelper::map(\app\models\Inventory::find()->all(),
           'item_id','item_name'),
   'size'          => Select2::LARGE,
   'options'       => ['placeholder' => '... حدد الصنف'],
   'pluginOptions' => [
       'allowClear' => true,
   ],
]);
?>
  </div>

    <div class="form-group" style="margin-right:16px">
         <?= Html::submitButton($model->isNewRecord ?'<span class="glyphicon glyphicon-log-out pad"></span>خروج من المخزن ':'<span class="glyphicon glyphicon-pencil  pad"></span> تعديل', ['class' =>$model->isNewRecord ? 'btn btn-outline-danger':'btn btn-outline-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
