<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

?>

<header class="main-header">

    <?= Html::a('<span class="logo-mini"><img src="/f/i/logo.png" alt="" width="45" style="margin: 0 12px;"></span><span class="logo-lg"><img src="/f/i/logo.png" alt="" height="45" ></span>', Yii::$app->homeUrl, ['class' => 'logo']) ?>

    <nav class="navbar navbar-static-top" role="navigation">

<!--        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">-->
            <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?= $directoryAsset ?>/dist/img/avatar5.png" class="user-image" alt="User Image"/>
                        <span class="hidden-xs"><?= Html::encode($user->username); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= $directoryAsset ?>/dist/img/avatar5.png" class="img-circle"
                                 alt="User Image"/>

                            <p>
                                <?= Html::encode($user->username); ?>
<!--                                <small>--><?//= Html::encode(\app\models\AdminUser::$roles[$user->role]); ?><!--</small>-->
                            </p>
                        </li>
                        <li class="user-footer">
                            <div class="pull-right">
                                <?= Html::a(
                                    'Выйти',
                                    ['/site/logout'],
                                    ['data-method' => 'post', 'class' => 'btn btn-default btn-flat']
                                ) ?>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>
