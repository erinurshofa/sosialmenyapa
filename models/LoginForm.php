<?php

namespace app\models;

use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = false;  // Properti rememberMe
    private $_user = false;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            ['password', 'validatePassword'],
            ['rememberMe', 'boolean'],  // Validasi untuk rememberMe
        ];
    }

    public function validatePassword($attribute, $params)
    {
        // if (!$this->hasErrors()) {
        //     $user = $this->getUser();
        //     if (!$user || !$user->validatePassword($this->password)) {
        //         $this->addError($attribute, 'Username atau password salah.');
        //     }
        // }
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user) {
                $this->addError($attribute, 'Username atau password salah.');
            } elseif (strtolower($user->status) !== 'aktif') {
                $this->addError($attribute, 'Akun Anda saat ini berstatus: ' . $user->status . '.');
            }elseif (strtolower($user->status) == 'belum aktif') {
                $this->addError($attribute, 'Akun Anda saat ini berstatus: ' . $user->status . ', Silahkan tunggu petugas mengaktifkan dan cek secara berkala email anda!');
            }
             elseif (!$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Username atau password salah.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();

            // Login dengan atau tanpa rememberMe
            if ($this->rememberMe) {
                Yii::$app->user->login($user, 3600 * 24 * 30); // 30 hari
            } else {
                Yii::$app->user->login($user, 0);  // Tidak ingat (session saja)
            }

            // Catat log login
            $log = new LoginLog();
            $log->logLogin($user, 'success');

            return true;
        }

        // Catat log login gagal
        $log = new LoginLog();
        $log->logLogin(null, 'failed');

        return false;
    }

    protected function getUser()
    {
        if ($this->_user === false) {
            $this->_user = Users::findByUsername($this->username);
        }
        return $this->_user;
    }
}
