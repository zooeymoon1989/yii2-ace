<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/26
 * Time: 0:26
 */
use yii\bootstrap\Alert;
?>

<?php if(Yii::$app->session->hasFlash('success')): ?>
<?= Alert::widget([
    'option'=>['class'=>'alert-success'],
    'body'=>Yii::$app->session->getFlash('success')
    ]);?>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')) :?>
    <?= Alert::widget([
    'options' => ['class' => 'alert-danger'],
    'body' => Yii::$app->session->getFlash('error'),
]);?>
<?php endif;?>
