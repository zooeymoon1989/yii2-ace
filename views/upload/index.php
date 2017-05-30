<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/30
 * Time: 3:19
 */
/* @var $model \app\models\Upload */
use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]) ?>
<?= $form->field($model,'file')->fileInput()?>
<?= Html::submitButton('Upload',['class'=>'btn-success'])?>
<?php ActiveForm::end()?>
