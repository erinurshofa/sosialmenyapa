<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ppks_mutakhir_status".
 *
 * @property int $id
 * @property int $ppks_id
 * @property string $status_sebelumnya
 * @property string $status_baru
 * @property string $dokumen_pendukung
 * @property string|null $keterangan_penolakan
 * @property string|null $status_pengajuan
 * @property string $created_at
 * @property int|null $created_by
 * @property string $updated_at
 * @property int|null $updated_by
 */
class PpksMutakhirStatus extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ppks_mutakhir_status';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['ppks_id', 'status_sebelumnya', 'status_baru', 'dokumen_pendukung'], 'required'],
            [['ppks_id', 'created_by', 'updated_by'], 'integer'],
            [['keterangan_penolakan', 'status_pengajuan'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['status_sebelumnya', 'status_baru'], 'string', 'max' => 50],
            [['dokumen_pendukung'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ppks_id' => 'Ppks ID',
            'status_sebelumnya' => 'Status Sebelumnya',
            'status_baru' => 'Status Baru',
            'dokumen_pendukung' => 'Dokumen Pendukung',
            'keterangan_penolakan' => 'Keterangan Penolakan',
            'status_pengajuan' => 'Status Pengajuan',
            'created_at' => 'Created At',
            'created_by' => 'Created By',
            'updated_at' => 'Updated At',
            'updated_by' => 'Updated By',
        ];
    }

    /**
     * Gets query for [[Ppks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPpks()
    {
        return $this->hasOne(Ppks::class, ['id' => 'ppks_id']);
    }
}
