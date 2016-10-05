<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RecordYuranBulanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="record-yuran-bulanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'january')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'february')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'march')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'april')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'may')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'june')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'july')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'august')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'september')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'october')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'november')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'december')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_yuran_bulanan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
