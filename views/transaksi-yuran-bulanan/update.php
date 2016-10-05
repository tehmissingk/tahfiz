<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TransaksiYuranBulanan */

$this->title = 'Update Transaksi Yuran Bulanan: ' . $model->id_transaksi_yuran_bulanan;
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Yuran Bulanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_transaksi_yuran_bulanan, 'url' => ['view', 'id' => $model->id_transaksi_yuran_bulanan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaksi-yuran-bulanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
