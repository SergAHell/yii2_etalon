<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="test-index">

    <div class="row">
        <div class="col-lg-9">
            <div class="box box-primary">
                <div class="box-header">
                    <p>
                    </p>
                </div>
                <div class="box-body">

                    <?= GridView::widget([
                        'layout'=>"{pager}\n{toolbar}\n{items}\n{pager}{summary}",
                        'dataProvider' => $dataProvider,
//						'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => '\kartik\grid\SerialColumn'],
//							'id',
                            'name',
                            'population',
                            [
                                'class' => '\kartik\grid\ActionColumn',
                                'template' => '{view} {update} {delete}',
                                'buttons'=>[
                                    'view' => function ($url, $model) {
                                        ob_start();
                                        Modal::begin([
                                            'header' => '<h4 class="modal-title">'.$model->name.'</h4>',
                                            'toggleButton' => ['tag'=>'a', 'label'=>'<span class="glyphicon glyphicon-eye-open"></span>']
                                        ]);
                                        echo DetailView::widget([
                                            'model' => $model,
                                            'mode'=>DetailView::MODE_VIEW,
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
                            'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i> '.$searchModel->displayName().'</h3>',
                            'type'=>'info',
                            'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> '.$searchModel->displayName(), ['create'], ['class' => 'btn btn-success btn-flat']),
                            'footer'=>false
                        ],
                    ]); ?>

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Фильтр</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <?php echo $this->render('../'.$searchModel->tableName().'/_search', ['model' => $searchModel]); ?>
                </div>
            </div>
        </div>
    </div>
</div>
