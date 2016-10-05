<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yuran Pendaftaran';
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
                 <div class="actions">
                        <?= Html::a('Jana Yuran Pendaftaran', FALSE, ['value' => Url::to(['/yuran-semasa/create','id'=>$id]), 'class' => 'btn btn-primary yuran']); ?>

                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            
            <div class="portlet-body">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'darjah',
            'tarikh_akhir_bayaran',
            'jumlah_yuran',

            [
                'header' => 'Tindakan',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{pembayaran}',
                'buttons' => [
                    'pembayaran' => function ($url, $model) {
                        return Html::a('<i class="fa fa-hand-o-right"></i>', 
                            $url,['title'=> Yii::t('app','Pembayaran'),'class'=>'btn btn-circle btn-icon-only grey-mint']);

                    },


                ],
            ],
        ],
    ]); ?>
            </div>
        </div>
    </div>
</div>
