<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DateOffSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Date Offs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="date-off-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Date Off', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php

  $widget = [
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
            'date_create',
            'date_end',
            'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]
?>
    <?= GridView::widget(); ?>
</div>
