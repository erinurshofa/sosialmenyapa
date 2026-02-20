<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "ref_status_terlantar".
 *
 * @property int $id
 * @property string $nama_status
 * @property string|null $aktif
 * @property string $created_at
 *
 * @property PpksLayananTerlantar[] $ppksLayananTerlantars
 */
class RefStatusTerlantar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ref_status_terlantar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'nama_status'], 'required'],
            [['id'], 'integer'],
            [['aktif'], 'string'],
            [['created_at'], 'safe'],
            [['nama_status'], 'string', 'max' => 100],
            [['id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_status' => 'Nama Status',
            'aktif' => 'Aktif',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Gets query for [[PpksLayananTerlantars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPpksLayananTerlantars()
    {
        return $this->hasMany(PpksLayananTerlantar::class, ['status_id' => 'id']);
    }
}
