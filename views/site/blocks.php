<?php
/**
 * Created by PhpStorm.
 * User: A
 * Date: 2017/5/29
 * Time: 2:36
 */

/* @var $this \yii\web\View */

use yii\helpers\Html;

?>

<?php
    $this->beginBlock('beforeContent');
    echo Html::tag('pre','Your IP is '.Yii::$app->request->userIP);
    $this->endBlock();
?>

<?php
    $this->beginBlock('footer');
    echo Html::tag('h3', 'My custom footer block');
    $this->endBlock();
?>
<h1>Blocks usage example</h1>
