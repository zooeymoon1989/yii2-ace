<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/30
 * Time: 12:36
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\EmailForm;
use yii\filters\AccessControl;

class EmailController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'captcha'],
                        'allow' => true,
                    ]
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $success = false;
        $model = new EmailForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()){

            Yii::$app->session->setFlash('success','Success!');

        }

        return $this->render('index',['model'=>$model,'success'=>$success]);    }

}