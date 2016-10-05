<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "record_yuran_bulanan".
 *
 * @property integer $id
 * @property double $january
 * @property double $february
 * @property double $march
 * @property double $april
 * @property double $may
 * @property double $june
 * @property double $july
 * @property double $august
 * @property double $september
 * @property double $october
 * @property double $november
 * @property double $december
 * @property integer $id_yuran_bulanan
 */
class RecordYuranBulanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'record_yuran_bulanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['january', 'february', 'march', 'april', 'may', 'june', 'july', 'august', 'september', 'october', 'november', 'december'], 'number'],
            [['id_yuran_bulanan'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'january' => 'January',
            'february' => 'February',
            'march' => 'March',
            'april' => 'April',
            'may' => 'May',
            'june' => 'June',
            'july' => 'July',
            'august' => 'August',
            'september' => 'September',
            'october' => 'October',
            'november' => 'November',
            'december' => 'December',
            'id_yuran_bulanan' => 'Id Yuran Bulanan',
        ];
    }
}
