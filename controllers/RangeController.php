<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/30
 * Time: 19:34
 */

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\RangeForm;

class RangeController extends Controller
{
    public function actionIndex()
    {
        $model = new RangeForm();

        if($model->load(Yii::$app->request->post()) && $model->validate()){
            Yii::$app->session->setFlash('rangeFormSubmitted','The form was successfully processed!');
        }

        return $this->render('index',['model'=>$model]);
    }
}