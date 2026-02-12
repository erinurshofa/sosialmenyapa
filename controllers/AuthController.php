<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\LoginForm;
use app\models\Actions;
use app\models\ActionsHelper2025;
use app\models\ActionsHelper2023;
use app\models\ActionsHelper;
use app\models\Services;
use app\models\Account;
use app\models\Kecamatan;
use app\models\ActionsRekap;
use app\models\ActionsBelajar;
use app\models\ActSecure;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use kartik\mpdf\Pdf;

class AuthController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    // public function actionLogin()
    // {
    //     if (!Yii::$app->user->isGuest) {
    //         return $this->redirect(['site/index']);
    //     }

    //     $model = new LoginForm();
    //     if ($model->load(Yii::$app->request->post()) && $model->login()) {
    //         return $this->redirect(['site/index']);
    //     }

    //     return $this->render('login', [
    //         'model' => $model,
    //     ]);
    // }

    public function actionLogin()
    {
        set_time_limit(300);
        $this->layout="modern-login";
        // Actions::setglobal();
        if (!Yii::$app->user->isGuest) {
            // Actions::updatedashboard();
            return $this->redirect(['site/dashboard']);
        }

        $model = new LoginForm();
        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
            // dd($model);
            if($model->login() && (ActSecure::validateInput($_POST['LoginForm']) != false)){
                ActionsHelper::loginLog();
                // Actions::createsession('januari_2022','bansos');
                return $this->redirect(['site/dashboard']);
                // return $this->goBack();
            }
        }
        
        
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['auth/login']);
    }
}
