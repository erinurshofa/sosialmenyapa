<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kegiatan_kategori".
 *
 * @property int $id
 * @property string $nama
 * @property string|null $deleted_at
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class KegiatanKategori extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kegiatan_kategori';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['deleted_at', 'created_at', 'updated_at'], 'safe'],
            [['nama'], 'string', 'max' => 255],
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
            'deleted_at' => 'Deleted At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
