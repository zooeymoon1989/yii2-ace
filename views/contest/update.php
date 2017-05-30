<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/31
 * Time: 0:58
 */
/* @var $prizes app\models\Prize*/

use yii\helpers\Html;
use yii\widgets\ActiveForm;
$form = ActiveForm::begin();
foreach ($prizes as $i => $prize) {
    echo $form->field($prize,
        "[$i]amount")->label($prize->name);
}
echo Html::submitButton('submit' , ['class' => 'btn btn-success']);
ActiveForm::end();