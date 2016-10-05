<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RecordYuranBulanan */

$this->title = 'Create Record Yuran Bulanan';
$this->params['breadcrumbs'][] = ['label' => 'Record Yuran Bulanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="record-yuran-bulanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
