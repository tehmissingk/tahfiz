<?php

use yii\helpers\Html;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rekod Yuran Pendaftaran Pelajar';
$this->params['breadcrumbs'][] = $this->title;
?>

<h3 class="page-title"><?= Html::encode($this->title) ?></h3>

<table class="table table-striped table-hover">
	<tr>
		<th>No My Kid</th>
		<td><?= $model->no_mykid ?></td>
	</tr>
	<tr>
		<th>Nama</th>
		<td><?= $model->nama_pelajar ?></td>
	</tr>
	<tr>
		<th>Alamat</th>
		<td><?= $model->alamat_rumah ?></td>
	</tr>
	<tr>
		<th>Darjah</th>
		<td></td>
	</tr>
	<tr>
		<th>Tahfiz</th>
		<td></td>
	</tr>
	<tr>
		<th>Nama Guru</th>
		<td></td>
	</tr>

</table>


<table class="table table-striped table-hover">
	<thead>
		<tr>
			<th>No</th>
			<th>Tarikh Bayaran</th>
			<th>No Resit</th>
			<th>Jumlah Bayaran (RM)</th>
			<th>Baki Yuran</th>
		</tr>
	</thead>
	<tbody>
	<?php $baki = $sum = $i = 0; foreach ($model_details as $key => $value) { $i++;?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo $value['tarikh_bayaran']; ?></td>
			<td><?php echo $value['no_resit']; ?></td>
			<td><?php $sum += $value['jumlah_bayaran']; echo $value['jumlah_bayaran']; ?></td>
			<td></td>
		</tr>
	<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Jumlah</th>
			<th>RM <?php echo $sum ?></th>
			<th><?php echo $baki; ?></th>
		</tr>
	</tfoot>
</table>

