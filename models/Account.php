<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "account".
 *
 * @property int $id_account
 * @property string $username
 * @property string $password
 * @property string $nama_lengkap
 * @property string $jabatan
 * @property string $telp
 * @property string $email
 * @property string $role
 * @property string $ip
 * @property string $browser
 * @property string $foto
 * @property string $host
 * @property string $konfirmasi_email
 * @property string $kode_konfirmasi
 * @property string $konfirmasi_admin
 * @property string $lastlogin
 * @property string $created
 * @property string $updated
 * @property int $flag
 */
class Account extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'account';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        // password iso 270001 standart 
        // match: Validates the password against a regular expression pattern that enforces:
        // At least one digit ((?=.*\d))
        // At least one lowercase letter ((?=.*[a-z]))
        // At least one uppercase letter ((?=.*[A-Z]))
        // At least one special character ((?=.*[@$!%*?&]))
        // Minimum 8 characters ({16,})
        return [
            [['username', 'password', 'nama', 'nip', 'nama_opd', 'alamat', 'jabatan', 'role'], 'required'],
            [['password'], 'match', 'pattern' => '/(?=.*\d)/','message'=>'Pastikan terdapat angka'],
            [['password'], 'match', 'pattern' => '/(?=.*[a-z])/','message'=>'Pastikan ada huruf kecil'],
            [['password'], 'match', 'pattern' => '/(?=.*[A-Z])/','message'=>'Pastikan ada huruf besar'],
            [['password'], 'match', 'pattern' => '/(?=.*[@$!%*?&])/','message'=>'Pastikan ada special karakter'],
            [['password'], 'match', 'pattern' => '/[A-Za-z\d@$!%*?&]{12,}/','message'=>'Minimal 12 karakter'],
            // [['password'], 'match', 'pattern' => '/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}/'],
            [['fototype','fotosize', 'fotoname', 'konfirmasi_email', 'konfirmasi_admin'], 'string'],
            [['foto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg'],
            [['lastlogin', 'created', 'updated'], 'safe'],
            [['flag'], 'integer'],
            [['username', 'password', 'nama'], 'string', 'max' => 50],
            [['jabatan'], 'string', 'max' => 255],
            [['telp', 'role', 'ip'], 'string', 'max' => 20],
            [['email','kode_kecamatan','kode_kelurahan'], 'string', 'max' => 30],
            [['browser'], 'string', 'max' => 200],
            [['host', 'kode_konfirmasi'], 'string', 'max' => 100],
            [['username'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_account' => 'Id Account',
            'username' => 'Username',
            'password' => 'Password',
            'nama' => 'Nama',
            'nip' => 'Nip',
            'nama_opd' => 'Nama OPD',
            'alamat' => 'Alamat',
            'jabatan' => 'Jabatan',
            'telp' => 'Telp',
            'email' => 'Email',
            'kode_kecamatan' => 'Kode Kecamatan',
            'kode_kelurahan' => 'Kode Kelurahan',
            'role' => 'Role',
            'ip' => 'Ip',
            'browser' => 'Browser',
            'foto' => 'Foto',
            'fototype'=>'Fototype',
            'fotosize' => 'Fotosize',
            'fotoname' => 'Fotoname',
            'host' => 'Host',
            'konfirmasi_email' => 'Konfirmasi Email',
            'kode_konfirmasi' => 'Kode Konfirmasi',
            'konfirmasi_admin' => 'Konfirmasi Admin',
            'lastlogin' => 'Lastlogin',
            'created' => 'Created',
            'updated' => 'Updated',
            'flag' => 'Flag',
        ];
    }
    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function validateISOPassword($password)
    {
        $minLength = 8; // Minimum password length (recommended: >= 8 characters)
        $minUpperCase = 1; // Minimum number of uppercase letters
        $minLowerCase = 1; // Minimum number of lowercase letters
        $minNumbers = 1; // Minimum number of digits
        $minSymbols = 1; // Minimum number of symbols

        $pattern = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{" . $minLength . ",}$/";

        if (!preg_match($pattern, $password)) {
            $this->addError('password', 'Password must be at least ' . $minLength . ' characters long, contain at least one uppercase letter, one lowercase letter, one digit, and one symbol.');
            return false;
        }

        return true;
    }
}
