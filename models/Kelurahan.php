<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kelurahan".
 *
 * @property int $id
 * @property string $nama
 * @property int $kecamatan_id
 *
 * @property Kecamatan $kecamatan
 * @property Users[] $users
 */
class Kelurahan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kelurahan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama', 'kecamatan_id'], 'required'],
            [['kecamatan_id','kecamatan_id_baru','kelurahan_id'], 'integer'],
            [['nama'], 'string', 'max' => 100],
            [['kecamatan_id'], 'exist', 'skipOnError' => true, 'targetClass' => Kecamatan::className(), 'targetAttribute' => ['kecamatan_id' => 'id']],
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
            'kecamatan_id' => 'Kecamatan ID',
            'kecamatan_id_baru' => 'Kecamatan ID Baru',
            'kelurahan_id' => 'Kelurahan ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id' => 'kecamatan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['kelurahan_id' => 'id']);
    }
}
