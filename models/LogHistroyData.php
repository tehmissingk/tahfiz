<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "log_histroy_data".
 *
 * @property integer $id
 * @property string $log_history
 * @property string $module
 * @property string $date_create
 * @property string $date_update
 * @property integer $enter_by
 * @property integer $update_by
 */
class LogHistroyData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'log_histroy_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['log_history'], 'string'],
            [['date_create', 'date_update'], 'safe'],
            [['enter_by', 'update_by'], 'integer'],
            [['module'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'log_history' => 'Log History',
            'module' => 'Module',
            'date_create' => 'Date Create',
            'date_update' => 'Date Update',
            'enter_by' => 'Enter By',
            'update_by' => 'Update By',
        ];
    }
}
