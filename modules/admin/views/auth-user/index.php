<?php

use kartik\grid\GridView;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthUserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-user-index">

    <div class="row">
        <div class="col-lg-12">
            <div class="box box-primary">
                <div class="box-header">
                    <p>
                    </p>
                </div>
                <div class="box-body">

                    <?php
                    echo GridView::widget([
                        'layout' => "{pager}\n{toolbar}\n{items}\n{pager}{summary}",
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            [
                                'attribute' => 'avatar',
                                'format'=>'html',
                                'value' => function($model){
                                    return !is_null($model->avatar) ? Html::img($model->avatar, ['width' => '50px']) : null;
                                }
                            ],
                            'username',
                            'email:email',
//                            'auth_key',
//                            'password_hash',
//                            'password_reset_token',
                            'role',
                            'is_blocked',
                            [
                                'class' => '\kartik\grid\ActionColumn',
                                'width' => 70,
                                'template' => '{view}  {viewm}   {update}  {delete}',
                                'buttons' => [
                                    'viewm' => function ($url, $model) {
                                        ob_start();
                                        Modal::begin([
                                            'header' => '<h4 class="modal-title">' . $model->username . '</h4>',
                                            'toggleButton' => ['tag' => 'a', 'label' => '<span class="glyphicon glyphicon-eye-close"></span>']
                                        ]);
                                        echo DetailView::widget([
                                            'model' => $model,
                                            'mode' => DetailView::MODE_VIEW,
                                            'condensed' => false,
                                            'hover' => true,
                                            'attributes' => $model->attributes()
                                        ]);
                                        Modal::end();
                                        return ob_get_clean();
                                    }
                                ]
                            ],
                        ],
                        'responsive' => true,
                        'hover' => true,
                        'toolbar' => [
                            '{pager}',
                        ],
                        'panel' => [
                            'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> ' . $searchModel->displayName() . '</h3>',
                            'type' => 'info',
                            'before' => Html::a('<i class="glyphicon glyphicon-plus"></i> ' . $searchModel->displayName(), ['create'], ['class' => 'btn btn-success btn-flat']),
                            'footer' => false
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
    </div>

</div>
