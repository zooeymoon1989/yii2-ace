<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/27
 * Time: 1:59
 */

namespace app\controllers;

use app\models\Product;
use app\models\Category;
use app\models\SubCategory;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\web\Controller;
use yii\web\HttpException;

class DropdownController extends Controller
{

    public function actionGetSubCategories($id)
    {

        if(!Yii::$app->request->isAjax){




        }

    }

}