<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\YuranBulanan */

$this->title = $model->id_yuran_bulanan;
$this->params['breadcrumbs'][] = ['label' => 'Yuran Bulanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yuran-bulanan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_yuran_bulanan], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_yuran_bulanan], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_yuran_bulanan',
            'id_pelajar',
            'darjah',
            'date_create',
            'date_update',
            'enter_by',
            'update_by',
        ],
    ]) ?>

</div>
