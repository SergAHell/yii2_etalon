<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = '';
?>

<div class="login-box">
	<div class="login-logo">
		<a href="#"><b>Admin</b> КОМЕТА</a>
	</div>
	<div class="login-box-body">
		<p class="login-box-msg">Залогиньтесь перед началом работы</p>

		<?php $form = ActiveForm::begin([
			'id' => 'login-form',
			'options' => ['class' => 'form-horizontal_'],
			'fieldConfig' => [
				'template' => "{label} {input} {error}",
				'labelOptions' => ['class' => 'col-lg-12 control-label'],
			],
		]); ?>

		<?= $form->field($model, 'username') ?>

		<?= $form->field($model, 'password')->passwordInput() ?>

		<div class="row">
			<div class="col-xs-8">
				<?= $form->field($model, 'rememberMe')->checkbox([
					'template' => "{input} {label} {error}",
				]) ?>
			</div>
			<div class="col-xs-4">
				<button type="submit" class="btn btn-primary btn-block btn-flat">Войти</button>
			</div>
		</div>
        <?php ActiveForm::end(); ?>
	</div>
</div>
