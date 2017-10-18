<?php
use yii\helpers\Html;
use yii\helpers\Url;

?>
<body>
<div class="container text-center">
    <div class="logo-404">
        <a href="<?= Url::home()?>"><?= Html::img(["@web/images/home/logo.png"])?></a>
    </div>
    <div class="content-404">
        <?= Html::img(["@web/images/404/404.png",['class'=>'img-responsive']])?>
        <h1><b>OPPS!</b> We Couldn’t Find this Page</h1>
        <p>Uh... So it looks like you brock something. The page you are looking for has up and Vanished.</p>
        <h2><a href="<?= Url::home()?>">Bring me back Home</a></h2>
    </div>
</div>

</body>