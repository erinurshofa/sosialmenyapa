<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jenis_bencana".
 *
 * @property int $id
 * @property string $nama
 * @property int $alam
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class JenisBencana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'jenis_bencana';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama'], 'required'],
            [['alam'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['nama'], 'string', 'max' => 50],
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
            'alam' => 'Alam',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
