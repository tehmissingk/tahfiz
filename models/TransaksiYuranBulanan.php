<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transaksi_yuran_bulanan".
 *
 * @property integer $id_transaksi_yuran_bulanan
 * @property string $bulan
 * @property string $tarikh_bayaran
 * @property double $jumlah_bayaran
 * @property string $nota
 * @property string $no_resit
 * @property integer $id_yuran_bulanan
 */
class TransaksiYuranBulanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transaksi_yuran_bulanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bulan', 'nota','transaksi', 'jenis_transaksi'], 'string'],
            [['amaun'], 'number'],
            [['id_yuran_bulanan'], 'integer'],
            [['tarikh', 'no_resit'], 'string', 'max' => 20],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_transaksi_yuran_bulanan' => 'Id Transaksi Yuran Bulanan',
            'bulan' => 'Bulan',
            'tarikh' => 'Tarikh Bayaran',
            'amaun' => 'Amaun',
            'transaksi' => 'Transaksi',
            'jenis_transaksi' => 'Jenis Transaksi',
            'nota' => 'Nota',
            'no_resit' => 'No Resit',
            'id_yuran_bulanan' => 'Id Yuran Bulanan',
        ];
    }
}
