<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

use yii\helpers\Url;
use app\models\LookupPendapatan;
use app\models\LookupPusatPengajian;

$pendapatan = ArrayHelper::map(LookupPendapatan::find()->asArray()->all(), 'id', 'pendapatan');
$pengajian = ArrayHelper::map(LookupPusatPengajian::find()->asArray()->all(), 'id', 'pusat_pengajian');
/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajarPenjaga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="maklumat-pelajar-penjaga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_pelajar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jantina')->dropDownList([ 'Lelaki' => 'Lelaki', 'Perempuan' => 'Perempuan', ], ['prompt' => '--Sila Pilih--']) ?>

    <?= $form->field($model, 'tarikh_lahir')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tempat_lahir')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_surat_beranak')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_mykid')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pusat_pengajian_id')->textInput() ?>

    <?= $form->field($model, 'sesi_pengajian')->dropDownList([ 'Pagi' => 'Pagi', 'Petang' => 'Petang', ], ['prompt' => '--Sila Pilih--']) ?>

    <?= $form->field($model, 'tarikh_masuk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_mula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_rumah')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'SPRA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PSRA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Approved' => 'Approved', 'Pending' => 'Pending', ], ['prompt' => '--Sila Pilih--']) ?>

    <?= $form->field($model, 'warganegara')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_lewat')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alumni')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nama_bapa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_kad_pengenalan_bapa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_bapa_penjaga')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_tel_bapa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp_bapa')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_majikan_bapa_penjaga')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gaji_bapa')->dropDownList(
        $pendapatan, 
    [
        'prompt' => '--Sila Pilih--',

    ]) ?>

    <?= $form->field($model, 'nama_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_kad_pengenalan_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pekerjaan_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_tel_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'no_hp_ibu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'alamat_majikan_ibu')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'gaji_ibu')->dropDownList(
        $pendapatan, 
    [
        'prompt' => '--Sila Pilih--',

    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
