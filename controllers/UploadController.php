<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/30
 * Time: 3:16
 */

namespace app\controllers;

use yii\web\Controller;
use Yii;
use app\models\Upload;
use yii\web\UploadedFile;

class UploadController extends Controller
{

    public function actionUpload()
    {
        $model = new Upload();

        if(Yii::$app->request->isPost){
            $model->file = UploadedFile::getInstance($model,'file');

            if($model->upload()){
                return $this->renderContent("file {$model->file->name} is uploaded successfully");
            }
        }

        return $this->render('index',['model'=>$model]);
    }

}