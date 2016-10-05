<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatPelajarPenjagaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Pelajar - Yuran';
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
                        <a href="" class="collapse"> </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">

                <?php Pjax::begin(); ?>    
                <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            'nama_pelajar',
                            'jantina',
                            'no_surat_beranak',
                            'no_mykid',

                            [
                                'header' => 'Action',
                                'class' => 'yii\grid\ActionColumn',
                                'template'=>'{yuran}   {bulanan}',
                                    'buttons' => [
                                        'yuran' => function ($url, $model) {
                                            return Html::a('<i class="fa fa-credit-card"></i>', 
                                            $url,['title'=> Yii::t('app','Yuran Pendaftaran'),'class'=>'btn btn-circle btn-icon-only purple-plum']);

                                        },
                                        'bulanan' => function ($url, $model) {
                                            return Html::a('<i class="fa fa-google-wallet"></i>', 
                                            $url,['title'=> Yii::t('app','Yuran Bulanan'),'class'=>'btn btn-circle btn-icon-only yellow-soft','data-pjax'=>0]);

                                        },

                                    ],
                                    'urlCreator' => function ($action, $model, $key, $index) {
                                        if ($action === 'yuran') {
                                            $url = ['/yuran-semasa/index','id'=>$model->id];
                                            return $url;
                                        }
                                        if ($action === 'bulanan') {
                                            $url = ['/yuran-bulanan/index','id'=>$model->id];
                                            return $url;
                                        }
                                    }
                                ],


                        ],
                    
                    ]); ?>
                <?php Pjax::end(); ?>

            </div>
        </div>
    </div>
</div>





