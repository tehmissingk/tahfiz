<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Yuran Bulanan';
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
    

                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            
            <div class="portlet-body">
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id_pelajar',
            'darjah',

            [
                'header' => 'Action',
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{pembayaran}',
                    'buttons' => [
                        'pembayaran' => function ($url, $model) {
                            return Html::a('<i class="fa fa-hand-o-right"></i>', 
                            $url,['title'=> Yii::t('app','Yuran'),'class'=>'btn btn-circle btn-icon-only grey-mint','data-pjax'=>0]);

                        },


                    ],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        if ($action === 'pembayaran') {
                            $url = ['/transaksi-yuran-bulanan/index','id'=>$model->id_yuran_bulanan];
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
