<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InventoryHistory */

$this->title = 'خروج مستلزمات من المخزن';

?>
<div class="inventory-history-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
