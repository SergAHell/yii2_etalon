<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\detail\DetailView;
use yii\bootstrap\Modal;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список: ';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="test-index">

	<div class="row">
		<div class="col-lg-9">
			<div class="box box-primary">
				<div class="box-header">
					<p>
<!--						--><?//= Html::a('Create Test', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
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
							'age',
							[
								'class' => '\kartik\grid\ActionColumn',
//								'deleteOptions' => ['label' => '<i class="glyphicon glyphicon-remove"></i>'],
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
//											'panel' => [
//												'heading' => 'Test # ' . $model->id,
//												'type' => DetailView::TYPE_INFO,
//											],

											'attributes' => $model->attributes()
										]);
										Modal::end();
										return ob_get_clean();
//										return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, [
//											'title' => Yii::t('yii', $model->age),
//										]);

									}
								]
							],
						],
						'responsive' => true,
						'hover' => true,
//						'resizableColumns' => true,
//						'resizeStorageKey' => Yii::$app->user->id . '-' . date("m"),
//						'floatHeader' => true,
//						'floatHeaderOptions' => ['scrollingTop' => '50'],
//						'showPageSummary' => true,
						'toolbar' => [
							'{pager}',
//							'{export}',
//							'{toggleData}',
						],
//						'toggleDataContainer' => ['class' => 'btn-group-sm'],
//						'exportContainer' => ['class' => 'btn-group-sm'],
						'panel' => [
							'heading'=>'<h3 class="panel-title"><i class="glyphicon glyphicon-globe"></i>Test</h3>',
							'type'=>'info',
							'before'=>Html::a('<i class="glyphicon glyphicon-plus"></i> Create Test', ['create'], ['class' => 'btn btn-success btn-flat']),
//							'after'=>Html::a('<i class="glyphicon glyphicon-repeat"></i> Reset Grid', ['index'], ['class' => 'btn btn-info btn-flat']),
							'footer'=>false
						],
					]); ?>
<!--					--><?//= \app\modules\admin\widgets\PageSize::widget(); ?>

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
				<div class="box-body no-padding_">
					<?php echo $this->render('_search', ['model' => $searchModel]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
