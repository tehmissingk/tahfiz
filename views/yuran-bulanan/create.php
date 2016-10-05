<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\YuranBulanan */

$this->title = 'Create Yuran Bulanan';
$this->params['breadcrumbs'][] = ['label' => 'Yuran Bulanans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="yuran-bulanan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
