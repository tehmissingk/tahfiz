<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TransaksiYuranBulanan */

$this->title = 'Create Transaksi Yuran Bulanan';
$this->params['breadcrumbs'][] = ['label' => 'Transaksi Yuran Bulanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaksi-yuran-bulanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
