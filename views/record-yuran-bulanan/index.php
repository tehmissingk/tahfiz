<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Record Yuran Bulanans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-yuran-bulanan-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Record Yuran Bulanan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'january',
            'february',
            'march',
            'april',
            // 'may',
            // 'june',
            // 'july',
            // 'august',
            // 'september',
            // 'october',
            // 'november',
            // 'december',
            // 'id_yuran_bulanan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
