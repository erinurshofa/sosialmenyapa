<?php

namespace app\models;
use app\models\ActSecure;

class User extends \yii\base\BaseObject implements \yii\web\IdentityInterface
{
    public $id_account;
    public $username;
    public $password;
    public $nama_lengkap;
    public $nip;
    public $nama_opd;
    public $alamat;
    public $jabatan;
    public $telp;
    public $email;
    public $kode_kecamatan;
    public $kode_kelurahan;
    public $role;
    public $ip;
    public $browser;
    public $host;
    public $konfirmasi_email;
    public $kode_konfirmasi;
    public $konfirmasi_admin;
    public $foto;
    public $fototype;
    public $fotosize;    
    public $fotoname;
    public $updated;
    public $lastlogin;
    public $created;
    public $flag;
    public $authKey;
    public $accessToken;

    // private static $users = [
    //     '100' => [
    //         'id' => '100',
    //         'username' => 'admin',
    //         'password' => 'admin',
    //         'authKey' => 'test100key',
    //         'accessToken' => '100-token',
    //     ],
    //     '101' => [
    //         'id' => '101',
    //         'username' => 'demo',
    //         'password' => 'demo',
    //         'authKey' => 'test101key',
    //         'accessToken' => '101-token',
    //     ],
    // ];


    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        // return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
        $dbUser = Users::find()
                ->where([
                    "id" => $id
                ])
                ->one();
        //if (!count($dbUser)) {
        //    return null;
        //}
        return $dbUser;
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        // foreach (self::$users as $user) {
        //     if (strcasecmp($user['username'], $username) === 0) {
        //         return new static($user);
        //     }
        // }

        // return null;
        $dbUser = Users::find()
                ->where([
                    "username" => $username
                ])
                ->one();
        //if (!count($dbUser)) {
        //    return null;
        //}
        return new static($dbUser);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id_account;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === ActSecure::encryptPassword($password);
    }

    // public static function isUserAdmin($username)
    // {
    //     if (Account::findOne(["username"=>$username,'role'=> 'admin']))
    //         return true;
    //             else
    //             return false;


    // }
}
