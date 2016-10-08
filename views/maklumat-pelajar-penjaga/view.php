<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajarPenjaga */

$this->title = 'Lihat Maklumat Pelajar : '.$model->nama_pelajar;
$this->params['breadcrumbs'][] = ['label' => 'Maklumat Pelajar Penjaga', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- BEGIN PAGE TITLE-->
<h3 class="page-title"><?= Html::encode($this->title) ?></h3>
<!-- END PAGE TITLE-->

<div class="row">
    <div class="col-md-12">
        <div class="portlet light bordered ">
            <div class="portlet-title">
                <div class="caption font-green-haze">

                    <span class="caption-subject bold uppercase"><?= Html::encode($this->title) ?></span>
                </div>
                 <div class="tools actions">

                            <div class="btn-group">
                                <a class="btn btn-sm blue-chambray dropdown-toggle" href="javascript:;" data-toggle="dropdown"> Actions
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li>
                                        <?= Html::a('Kemaskini', ['update', 'id' => $model->id], ['class' => '#']) ?>
                                    </li>
                                    <li>
                                    <?= Html::a('Buang', ['delete', 'id' => $model->id], [
                                        'class' => '#',
                                        'data' => [
                                            'confirm' => 'Are you sure you want to delete this item?',
                                            'method' => 'post',
                                        ],
                                    ]) ?>
            
                                    </li>
                                </ul>
                            </div>


                        <a href="" class="collapse"> </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>

                </div>
            </div>
            <div class="portlet-body" >
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'nama_pelajar',
            'jantina',
            'tarikh_lahir',
            'tempat_lahir:ntext',
            'no_surat_beranak',
            'no_mykid',
            'pusat_pengajian_id',
            'sesi_pengajian',
            'tarikh_masuk',
            'tahun_mula',
            'alamat_rumah:ntext',
            'SPRA',
            'PSRA',
            'status',
            'warganegara',
            'tahun_lewat',
            'alumni',
            'nama_bapa',
            'no_kad_pengenalan_bapa',
            'pekerjaan_bapa_penjaga',
            'no_tel_bapa',
            'no_hp_bapa',
            'alamat_majikan_bapa_penjaga:ntext',
            [
                'attribute' => 'Gaji Bapa',
                'value'=>$model->gaji_bapa ? $model->pendapatanbapa->pendapatan : null,
            ],
            'nama_ibu',
            'no_kad_pengenalan_ibu',
            'pekerjaan_ibu',
            'no_tel_ibu',
            'no_hp_ibu',
            'alamat_majikan_ibu:ntext',
            'gaji_ibu',
            [
                'attribute' => 'Gaji Ibu',
                'value'=>$model->gaji_ibu ? $model->pendapatanibu->pendapatan : null,
            ],



        ],
    ]) ?>

            </div>
        </div>
    </div>
</div>