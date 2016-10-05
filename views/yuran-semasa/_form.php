<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\YuranSemasa */
/* @var $form yii\widgets\ActiveForm */
?>

<style type="text/css">
	
.date-picker {
	z-index: 10000 !important;
}
</style>

<div class="yuran-semasa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php  echo '<label class="control-label">Tarikh Akhir Bayaran</label>';
    echo DatePicker::widget([
        'name' => 'YuranSemasa[tarikh_akhir_bayaran]',
        'type' => DatePicker::TYPE_COMPONENT_PREPEND,
        'pluginOptions' => [
            'autoclose'=>true,
            'format' => 'dd/mm/yyyy'
        ]
    ]); ?>
    <br>

    <div class="form-group">
        <label><b>Senarai Yuran</b></label>
            <div class="mt-checkbox-list">
                <?php $sum = 0; foreach ($yuran as $key => $value) { ?>
                <label class="mt-checkbox">
                <?php echo $value['jenis_bayaran'];?> - RM <?php echo number_format((float)$value['jumlah'],2,'.','');?> 

                    <input type="checkbox" value="<?php echo $value['id'];?>" name="YuranSemasa[jenis_yuran][]" disabled checked />
                    <input type="hidden" value="<?php echo $value['id'];?>" name="YuranSemasa[jenis_yuran][]" />
                    <span></span>
                </label>

                <?php 
                if ($value['id'] ==3) {
                   $bulanan =  $value['jumlah'];
                }
                $sum += $value['jumlah']; ?>
            
                <?php } ?>

            </div>

    </div>

    <?= $form->field($model, 'jumlah_yuran')->textInput(['value' => $sum,'readOnly'=>'readOnly']) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Simpan' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
