<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MaklumatPelajarPenjaga */

$this->title = 'Kemaskini Maklumat Pelajar: ' . $model->nama_pelajar;
$this->params['breadcrumbs'][] = ['label' => 'Maklumat Pelajar Penjaga', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nama_pelajar, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Kemaskini';
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

                        <a href="" class="collapse"> </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>

                </div>
            </div>
            <div class="portlet-body" >
			    <?= $this->render('_form', [
			        'model' => $model,
			    ]) ?>

            </div>
        </div>
    </div>
</div>

