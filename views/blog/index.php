<?php
/* @var $category string */
/* @var $posts array */
/* @var $this \yii\web\View */
?>
<h1>blog/index</h1>

<div class="row">
    <div class="col-xs-7">
        <h1>Posts</h1>
        <hr>
        <?php foreach ($posts as $post):?>
            <h3><?= $post['title']?></h3>
            <p><?= $post['content']?></p>
        <?php endforeach;?>
    </div>
    <div class="col-xs-5">
        <?= $this->render('//common/twitter');?>
    </div>
</div>
