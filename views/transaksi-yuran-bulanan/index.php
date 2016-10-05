<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Transaksi Yuran Bulanans';
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
                        <?= Html::a('Pembayaran', FALSE, ['value' => Url::to(['create','id'=>$id]), 'class' => 'btn btn-primary bulanan']); ?>

                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            
            <div class="portlet-body">
   <?= GridView::widget([
        'dataProvider' => $kredit,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'bulan',
            'tarikh',
            'amaun',
            'transaksi',
            'jenis_transaksi',
            //'nota:ntext',
            //'no_resit',
            // 'id_yuran_bulanan',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

   <?= GridView::widget([
        'dataProvider' => $debit,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'bulan',
            'tarikh',
            'amaun',
            'transaksi',
            'jenis_transaksi',
            //'nota:ntext',
            //'no_resit',
            // 'id_yuran_bulanan',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


<?php 

foreach ($t1 as $key => $value) {
   $t1 = $value['t1'];
}

foreach ($t2 as $key => $value) {
   $t2 = $value['t2'];
}

foreach ($b1 as $key => $value) {
   $b1 = $value['b1'];
}

foreach ($b2 as $key => $value) {
   $b2 = $value['b2'];
}

$tunggakan = $t1 - $t2;


$bayar = $b2 - $b1;
echo "Yuran Tertunggak : ".$tunggakan;
echo "<br>";
echo "Jumlah Perlu Bayar : ".$bayar;
echo "<br>";

?>



            </div>
        </div>
    </div>
</div>