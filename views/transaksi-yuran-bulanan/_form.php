<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\TransaksiYuranBulanan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="transaksi-yuran-bulanan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'bulan')->dropDownList([ 'January' => 'January', 'February' => 'February', 'March' => 'March', 'April' => 'April', 'May' => 'May', 'June' => 'June', 'July' => 'July', 'August' => 'August', 'September' => 'September', 'October' => 'October', 'November' => 'November', 'December' => 'December', ], ['prompt' => '']) ?>


    <?php  echo '<label class="control-label">Tarikh Bayaran</label>';
    echo DatePicker::widget([
        'name' => 'TransaksiYuranBulanan[tarikh]',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'yyyy-mm-dd'
        ]
    ]); ?>
    <br>

    <?= $form->field($model, 'amaun')->textInput() ?>

    <?= $form->field($model, 'nota')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'no_resit')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
