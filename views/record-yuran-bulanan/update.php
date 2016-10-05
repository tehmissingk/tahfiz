<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RecordYuranBulanan */

$this->title = 'Update Record Yuran Bulanan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Record Yuran Bulanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="record-yuran-bulanan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
