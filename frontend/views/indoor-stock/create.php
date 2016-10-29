<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\IndoorStock */

$this->title = 'Create Indoor Stock';
$this->params['breadcrumbs'][] = ['label' => 'Indoor Stocks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="indoor-stock-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
