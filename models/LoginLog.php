<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class LoginLog extends ActiveRecord
{
    public static function tableName()
    {
        return 'login_log';
    }

    public function rules()
    {
        return [
            [['user_id', 'username', 'status'], 'required'],
            [['user_id'], 'integer'],
            [['login_time'], 'safe'],
            [['user_agent'], 'string'],
            [['username'], 'string', 'max' => 50],
            [['ip_address'], 'string', 'max' => 45],
            [['status'], 'in', 'range' => ['success', 'failed']],
        ];
    }

    public function logLogin($user, $status)
    {
        $this->user_id = $user ? $user->id : null;
        $this->username = $user ? $user->username : 'unknown';
        $this->status = $status;
        $this->ip_address = Yii::$app->request->userIP;
        $this->user_agent = Yii::$app->request->userAgent;
        $this->save();

        // $userId = $user ? $user->id : null;

        // Yii::$app->db->createCommand()->insert('login_log', [
        //     'user_id' => $userId, // Bisa NULL jika user tidak ditemukan
        //     'username' => $username ?: 'unknown',
        //     'status' => $status,
        //     'ip_address' => Yii::$app->request->userIP,
        //     'user_agent' => Yii::$app->request->userAgent,
        // ])->execute();

    }
}
