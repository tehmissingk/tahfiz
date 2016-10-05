<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "yuran_bulanan".
 *
 * @property integer $id_yuran_bulanan
 * @property integer $id_pelajar
 * @property integer $tahun
 * @property string $date_create
 * @property string $date_update
 * @property integer $enter_by
 * @property integer $update_by
 */
class YuranBulanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yuran_bulanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pelajar', 'darjah', 'enter_by', 'update_by'], 'integer'],
            [['date_create', 'date_update'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_yuran_bulanan' => 'Id Yuran Bulanan',
            'id_pelajar' => 'Id Pelajar',
            'darjah' => 'Darjah',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'enter_by' => 'Enter By',
            'update_by' => 'Update By',
        ];
    }
}
