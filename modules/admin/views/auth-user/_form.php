<?php

use kartik\widgets\FileInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\AuthUser;

/* @var $this yii\web\View */
/* @var $model app\models\AuthUser */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="auth-user-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'role')->dropDownList(AuthUser::$roles, ['prompt' => '']) ?>

    <?= $form->field($model, 'avatar')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        'pluginOptions' => [
            'showPreview' => true,
            'showCaption' => true,
            'showRemove' => true,
            'showUpload' => false,

            'browseLabel' => '&nbsp;&nbsp; Открыть',
            'removeLabel' => '&nbsp;&nbsp; Удалить',
            'mainClass' => 'input-group-lg',

            'initialPreview' => [
                is_null($model->avatar) ? null : Html::img($model->avatar, ['class' => 'file-preview-image', 'alt' => 'avatar', 'title' => 'Avatar']),
            ],
            'initialCaption' => "Загрузите аватарку",
            'overwriteInitial' => true,
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
