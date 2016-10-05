<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\YuranBulanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="yuran-bulanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pelajar')->textInput() ?>

    <?= $form->field($model, 'darjah')->textInput() ?>

    <?= $form->field($model, 'date_create')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_update')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enter_by')->textInput() ?>

    <?= $form->field($model, 'update_by')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
