<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $nama_lengkap
 * @property int $role_id
 * @property int|null $kecamatan_id
 * @property int|null $kelurahan_id
 * @property string $created_at
 * @property string $updated_at
 */
class Users extends ActiveRecord implements IdentityInterface
{
    public $new_password;
    public static function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['username', 'password', 'nama_lengkap', 'role','email'], 'required'],
            [['role_id', 'kecamatan_id', 'kelurahan_id','psm_id'], 'integer'],
            [['created_at', 'updated_at','foto'], 'safe'],
            [['username'], 'string', 'max' => 50],
            [['password', 'nama_lengkap'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'email'],
            [['new_password'], 'string', 'min' => 6], // Validasi password baru
            [['password_hint'], 'string', 'max' => 255],
            [['foto'], 'file', 'extensions' => 'png, jpg, jpeg', 'skipOnEmpty' => true],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'nama_lengkap' => 'Nama Lengkap',
            'role_id' => 'Role',
            'role' => 'Role',
            'email'=>'Email',
            'kecamatan_id' => 'Kecamatan',
            'kelurahan_id' => 'Kelurahan',
            'psm_id' => 'PSM ID',
            'foto' => 'Foto',
            'created_at' => 'Dibuat',
            'updated_at' => 'Diperbarui',
        ];
    }

    public function getRole()
    {
        return $this->hasOne(Roles::class, ['id' => 'role_id']);
    }

    // public function getKecamatan()
    // {
    //     return $this->hasOne(Kecamatan::class, ['id' => 'kecamatan_id']);
    // }

    // public function getKelurahan()
    // {
    //     return $this->hasOne(Kelurahan::class, ['id' => 'kelurahan_id']);
    // }

    public function getKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['id_lama' => 'kecamatan_id']);
    }

    public function getKelurahan()
    {
        return $this->hasOne(Kelurahan::className(), ['kelurahan_id' => 'kelurahan_id']);
    }
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }

    public function validatePassword($password)
    {
        // print_r($password);exit;
        return ActSecure::encryptPassword($password) === $this->password;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        // Cek apakah user sudah login
        if (Yii::$app->user->isGuest) {
            return; // Jika guest, hentikan proses
        }
        foreach ($changedAttributes as $kolom => $nilaiLama) {
            $nilaiBaru = $this->$kolom;
            $status="baru";
            if ($nilaiLama != $nilaiBaru) {
                $nilaiLama==null?$status:$status="edit";
                Yii::$app->db->createCommand()->insert('history_perubahan', [
                    'tabel_terkait' => static::tableName(),
                    'id_data' => $this->id,
                    'kolom' => $kolom,
                    'status' => $status,
                    'nilai_lama' => $nilaiLama,
                    'nilai_baru' => $nilaiBaru,
                    'user_id' => Yii::$app->user->id,
                    'created_at' => date('Y-m-d H:i:s'),
                ])->execute();
            }
        }
    }
    public function upload()
    {
        if ($this->validate()) {
            $fileName = 'user_' . $this->id . '.' . $this->photo->extension;
            $this->foto->saveAs(Yii::getAlias('@webroot/uploads/users/') . $fileName);
            $this->foto = $fileName;
            return true;
        }
        return false;
    }



}
