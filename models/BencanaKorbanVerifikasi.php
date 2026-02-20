<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bencana_korban_verifikasi".
 *
 * @property int $id
 * @property int $korban_id
 * @property string|null $tahap
 * @property string|null $status
 * @property string|null $keterangan
 * @property int|null $processed_by
 * @property string|null $processed_at
 * @property string $created_at
 *
 * @property BencanaKorbanIndividu $korban
 * @property Users $processedBy
 */
class BencanaKorbanVerifikasi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bencana_korban_verifikasi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['korban_id'], 'required'],
            [['korban_id', 'processed_by'], 'integer'],
            [['tahap', 'status', 'keterangan'], 'string'],
            [['processed_at', 'created_at'], 'safe'],
            [['korban_id'], 'exist', 'skipOnError' => true, 'targetClass' => BencanaKorbanIndividu::class, 'targetAttribute' => ['korban_id' => 'id']],
            [['processed_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['processed_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'korban_id' => 'Korban ID',
            'tahap' => 'Tahap',
            'status' => 'Status',
            'keterangan' => 'Keterangan',
            'processed_by' => 'Processed By',
            'processed_at' => 'Processed At',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[Korban]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKorban()
    {
        return $this->hasOne(BencanaKorbanIndividu::class, ['id' => 'korban_id']);
    }

    /**
     * Gets query for [[ProcessedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProcessedBy()
    {
        return $this->hasOne(Users::class, ['id' => 'processed_by']);
    }
}
