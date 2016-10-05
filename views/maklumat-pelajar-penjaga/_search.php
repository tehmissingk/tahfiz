<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajarPenjagaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maklumat-pelajar-penjaga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'nama_pelajar') ?>

    <?= $form->field($model, 'jantina') ?>


    <?= $form->field($model, 'no_surat_beranak') ?>

    <?= $form->field($model, 'no_mykid') ?>

    <?php // echo $form->field($model, 'pusat_pengajian_id') ?>

    <?php // echo $form->field($model, 'sesi_pengajian') ?>

    <?php // echo $form->field($model, 'tarikh_masuk') ?>

    <?php // echo $form->field($model, 'tahun_mula') ?>

    <?php // echo $form->field($model, 'alamat_rumah') ?>

    <?php // echo $form->field($model, 'SPRA') ?>

    <?php // echo $form->field($model, 'PSRA') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'warganegara') ?>

    <?php // echo $form->field($model, 'tahun_lewat') ?>

    <?php // echo $form->field($model, 'alumni') ?>

    <?php // echo $form->field($model, 'nama_bapa') ?>

    <?php // echo $form->field($model, 'no_kad_pengenalan_bapa') ?>

    <?php // echo $form->field($model, 'pekerjaan_bapa_penjaga') ?>

    <?php // echo $form->field($model, 'no_tel_bapa') ?>

    <?php // echo $form->field($model, 'no_hp_bapa') ?>

    <?php // echo $form->field($model, 'alamat_majikan_bapa_penjaga') ?>

    <?php // echo $form->field($model, 'gaji_bapa') ?>

    <?php // echo $form->field($model, 'nama_ibu') ?>

    <?php // echo $form->field($model, 'no_kad_pengenalan_ibu') ?>

    <?php // echo $form->field($model, 'pekerjaan_ibu') ?>

    <?php // echo $form->field($model, 'no_tel_ibu') ?>

    <?php // echo $form->field($model, 'no_hp_ibu') ?>

    <?php // echo $form->field($model, 'alamat_majikan_ibu') ?>

    <?php // echo $form->field($model, 'gaji_ibu') ?>

    <?php // echo $form->field($model, 'date_create') ?>

    <?php // echo $form->field($model, 'date_update') ?>

    <?php // echo $form->field($model, 'enter_by') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
