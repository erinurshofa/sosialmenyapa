<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "status_permohonan".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $keterangan
 * @property int $user_id
 * @property int $statusable_id
 * @property string $statusable_type
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class StatusPermohonan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'status_permohonan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'user_id', 'statusable_id', 'statusable_type'], 'required'],
            [['user_id', 'statusable_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama', 'keterangan', 'statusable_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'keterangan' => 'Keterangan',
            'user_id' => 'User ID',
            'statusable_id' => 'Statusable ID',
            'statusable_type' => 'Statusable Type',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
