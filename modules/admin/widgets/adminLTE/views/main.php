<?php
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
	<body class="sidebar-mini skin-blue <?=$base->isCollapsed ? 'sidebar-collapse' : '' ?>">
	<?php $this->beginBody() ?>
	<div class="wrapper">
		<?= $this->render( '_left.php',  ['base'=>$base, 'leftMenu'=>$leftMenu] ) ?>
		<?= $base->isHeader ? $this->render( '_header.php', ['base'=>$base] ) : '' ?>
		<?= $this->render( '_content.php',  ['content'=>$content, 'base'=>$base] ) ?>
		<?= $base->isFooter ? $this->render( '_footer.php', ['base'=>$base]) : '' ?>
		<?= $base->isRight ? $this->render( '_right.php', ['base'=>$base]) : '' ?>
	</div>

	<?php $this->endBody() ?>
	</body>
<?php } ?>
</html>
<?php $this->endPage() ?>
