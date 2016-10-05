<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\MaklumatPelajarPenjagaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Senarai Pelajar Mengikut Tahfiz';
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
                                        <?= Html::a('Jana', ['create'], ['class' => '#']) ?>
                                    </li>
                                </ul>
                            </div>


                        <a href="" class="collapse"> </a>
                        <a class="btn btn-circle btn-icon-only btn-default fullscreen" href="#"> </a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Pusat Pengajian</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($model_details as $key => $value) { ?>
                        <tr>
                            <td><?php echo $value['pusat_pengajian']; ?></td>
                            <td><?= Html::a($value['total'], ['detail', 'id_pusat' => $value['id_pusat']]) ?></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>



            </div>
        </div>
    </div>
</div>





