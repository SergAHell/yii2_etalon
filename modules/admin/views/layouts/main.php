<?php
use yii\helpers\Html;
use app\modules\admin\assets\AdminAsset;
use app\modules\admin\components;

/* @var $this \yii\web\View */
/* @var $content string */

AdminAsset::register($this);
\app\modules\admin\assets\BootboxAsset::overrideSystemConfirm();
if (Yii::$app->controller->action->id === 'login' || Yii::$app->user->isGuest) {
/**
 * Do not use this code in your template. Remove it. 
 * Instead, use the code  $this->layout = '//main-login'; in your controller.
 */
    echo $this->render(
        'main-login',
        ['content' => $content]
    );
} else {
    $user = \Yii::$app->user->identity;
    $directoryAsset = Yii::$app->assetManager->getPublishedUrl('@vendor/almasaeed2010/adminlte');
    ?>
    <?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="sidebar-mini <?=components\AdminSkinHelper::skinClass() ?>">
    <?php $this->beginBody() ?>
    <div class="wrapper">
        <?= $this->render(
            'header.php',
            ['directoryAsset' => $directoryAsset, 'user' => $user]
        ) ?>

          <?= $this->render(
            'left.php',
            ['directoryAsset' => $directoryAsset, 'user' => $user]
        )
        ?>

        <?= $this->render(
            'content.php',
            ['content' => $content, 'directoryAsset' => $directoryAsset, 'user' => $user]
        ) ?>

    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
    <?php $this->endPage() ?>
<?php } ?>
