<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IndoorHistory */

$this->title = 'خروج مستلزمات طبية للمريض';

?>
<div class="indoor-history-create">

    <?= $this->render('_form', [
        'model' => $model,
        'inventory' => $inventory,
    ]) ?>

</div>
