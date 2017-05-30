<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/26
 * Time: 0:19
 */

namespace app\controllers;

use Yii;
use yii\base\Action;
use yii\web\Controller;
use yii\filters\AccessControl;

class MyTestController extends Controller
{

    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'rules'=>[
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'actions' => ['user']
                    ],
                    [
                        'allow' => true,
                        'roles' => ['?'],
                        'actions' => ['index', 'success', 'error']
                    ]
                ],
                'denyCallback' => function ($rule, $action) {
                    Yii::$app->session->setFlash('error',
                        'This section is only for registered
users.');
                    $this->redirect(['index']);
                }
            ]
        ];
    }

    public function actionUser()
    {
        return $this->renderContent('user');
    }


    public function actionSuccess()
    {
        Yii::$app->session->setFlash('success','Everything went fine!');

        $this->redirect(['index']);
    }

    public function actionError()
    {
        Yii::$app->session->setFlash('error', 'Everything went wrong!');
        $this->redirect(['index']);
    }

    public function actionIndex()
    {
        return $this->render('index');
    }
}