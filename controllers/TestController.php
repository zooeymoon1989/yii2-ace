<?php

namespace app\controllers;


use app\components\BaseController;
use yii\helpers\ArrayHelper;

class TestController extends BaseController
{

    public function actions()
    {
        return ArrayHelper::merge(parent::actions(),[
            'page'=>[
                'class'=>'yii\web\ViewAction',
            ]
        ]);
    }


    public function behaviors()
    {
        $behaviors =  parent::behaviors(); // TODO: Change the autogenerated stub

        $rules = $behaviors['access']['rule'];

        $rules = ArrayHelper::merge(
            $rules,
            [
                [
                    'allow' => true,
                    'actions' => ['page']
                ]
            ]
        );

        $behaviors['access']['rules'] = $rules;

        return $behaviors;
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

}