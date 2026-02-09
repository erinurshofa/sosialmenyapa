<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_pmks_kriteria".
 *
 * @property int $id
 * @property string $kode
 * @property string $urutan
 * @property string $kriteria
 * @property string $created_at
 * @property string $updated_at
 */
class JenisPmksKriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_pmks_kriteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['kode', 'urutan', 'kriteria'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'urutan' => 'Urutan',
            'kriteria' => 'Kriteria',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
