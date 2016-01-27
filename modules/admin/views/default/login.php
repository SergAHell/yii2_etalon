<?php
die();
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '';
//$this->params['breadcrumbs'][] = $this->title;
?>

<!--<div class="site-login">
    <h1><?/*= Html::encode($this->title) */?></h1>

    <h1>ADMIN login:</h1>

    <?php /*$form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-2 control-label'],
        ],
    ]); */?>

    <?/*= $form->field($model, 'username') */?>

    <?/*= $form->field($model, 'password')->passwordInput() */?>

    <?/*= $form->field($model, 'rememberMe')->checkbox([
        'template' => "<div class=\"col-lg-offset-2 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
    ]) */?>

    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?/*= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) */?>
        </div>
    </div>

    <?php /*ActiveForm::end(); */?>
</div>
-->
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>Admin</b> КОММЕТА</a>
    </div>
    <!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">Залогиньтесь перед началом работы</p>

<!--        <form action="../../index2.html" method="post">-->
        <?php $form = ActiveForm::begin([
            'id' => 'login-form',
            'options' => ['class' => 'form-horizontal_'],
            'fieldConfig' => [
//                'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
                'template' => "{label} {input} {error}",
                'labelOptions' => ['class' => 'col-lg-12 control-label'],
            ],
        ]); ?>

        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="row">
            <div class="col-xs-8">
                <?= $form->field($model, 'rememberMe')->checkbox([
//            'template' => "<div class=\"col-lg-offset-2 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
                    'template' => "{input} {label} {error}",
                ]) ?>
            </div>
            <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Войти</button>
            </div>
        </div>
        
        

<!--        <div class="form-group">
            <div class="col-lg-offset-0 col-lg-5">
                <?/*= Html::submitButton('Войти', ['class' => 'btn btn-primary btn-block btn-flat', 'name' => 'login-button']) */?>
            </div>
        </div>
-->        
<!--            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Логин">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Пароль">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <div class="icheckbox_square-blue" aria-checked="false" aria-disabled="false" style="position: relative;"><input type="checkbox" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"><ins class="iCheck-helper" style="position: absolute; top: -20%; left: -20%; display: block; width: 140%; height: 140%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins></div> Remember Me
                        </label>
                    </div>
                </div>
                <div class="col-xs-4">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                </div>
            </div>
-->        <?php ActiveForm::end(); ?>
<!--        </form>-->

<!--        <div class="social-auth-links text-center">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                Facebook</a>
            <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                Google+</a>
        </div>
-->        <!-- /.social-auth-links -->

<!--        <a href="#">I forgot my password</a><br>
        <a href="register.html" class="text-center">Register a new membership</a>
-->
    </div>
    <!-- /.login-box-body -->
</div>
