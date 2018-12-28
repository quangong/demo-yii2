<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DateOff */

$this->title = 'Create Date Off';
$this->params['breadcrumbs'][] = ['label' => 'Date Offs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-off-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
