<?php
die();
use yii\helpers\Html;
use app\modules\admin\assets\AdminAsset;
//use app\modules\admin\components;

/* @var $this \yii\web\View */
/* @var $content string */

    AdminAsset::register($this);
    //BootboxAsset::overrideSystemConfirm();
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte');
    $user = \Yii::$app->user->identity;
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <?php $this->head() ?>
        <title><?= Html::encode($this->title) ?></title>
    </head>
    
    <?php if (false && (Yii::$app->controller->action->id === 'login' || Yii::$app->user->isGuest)) {
        echo $content; // login
    } else { ?>    
    <body class="sidebar-mini skin-blue">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <?= $this->render( '_left.php',  ['directoryAsset' => $directoryAsset, 'user' => $user] ) ?>
        <?= $this->render( '_header.php',  ['directoryAsset' => $directoryAsset, 'user' => $user] ) ?>
        <?= $this->render( '_content.php',  ['content'=>$content] ) ?>
        <?= $this->render( '_footer.php',  ['directoryAsset' => $directoryAsset, 'user' => $user] ) ?>
        <?= $this->render( '_right.php',  ['directoryAsset' => $directoryAsset, 'user' => $user] ) ?>
    </div>
    
    <?php $this->endBody() ?>
    </body>
    <?php } ?>
    </html>
    <?php $this->endPage() ?>
