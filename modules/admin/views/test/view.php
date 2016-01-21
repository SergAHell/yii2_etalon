<?php

use yii\helpers\Html;
//use yii\widgets\DetailView;
use kartik\detail\DetailView;
use yii\widgets\Breadcrumbs;
use yii\bootstrap\Modal;
use yii\bootstrap\Tabs;
use yii\bootstrap\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Test */

$this->title = 'Просмотр: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header">

			</div>
			<div class="box-body">
				<div class="test-view">
					<p>
						<?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
						<?= Html::a('Delete', ['delete', 'id' => $model->id], [
							'class' => 'btn btn-danger',
							'data' => [
								'confirm' => 'Are you sure you want to delete this item?',
								'method' => 'post',
							],
						]) ?>
					</p>

					<?php
					Modal::begin([
						'header' => '<h4 class="modal-title">Detail View Demo</h4>',
						'toggleButton' => ['name'=>'span', 'label' => '<i class="glyphicon glyphicon-th-list"></i> Detail View in Modal', 'class' => 'btn btn-primary']
					]);
//					echo Alert::widget([
//						'options' => [
//							'class' => 'alert-info',
//						],
//						'body' => 'Say hello...',
//					]);
//					echo Alert::widget([
//						'options' => [
//							'class' => 'alert-warning',
//						],
//						'body' => 'Say hello...',
//					]);
//					echo Alert::widget([
//						'options' => [
//							'class' => 'alert-error',
//						],
//						'body' => 'Say hello...',
//					]);
//					echo Alert::widget([
//						'options' => [
//							'class' => 'alert-success',
//						],
//						'body' => 'Say hello...',
//					]);
					$dv = DetailView::widget([
						'model' => $model,
						'mode'=>DetailView::MODE_VIEW,
						'condensed' => true,
						'hover' => true,
						'panel' => [
							'heading' => 'Test # ' . $model->id,
							'type' => DetailView::TYPE_INFO,
						],

						'attributes' => [
							'id',
							'name',
							'age',
						],
					]);
					echo $dv;

//					echo Tabs::widget([
//						'items' => [
//							[
//								'label' => 'One',
//								'content' => 'Anim pariatur cliche...',
//								'active' => true
//							],
//							[
//								'label' => 'Two',
//								'content' => $dv,
//								'headerOptions' => [],
//								'options' => ['id' => 'myveryownID'],
//							],
//							[
//								'label' => 'Dropdown',
//								'items' => [
//									[
//										'label' => 'DropdownA',
//										'content' => $dv,
//									],
//									[
//										'label' => 'DropdownB',
//										'content' => 'DropdownB, Anim pariatur cliche...',
//									],
//								],
//							],
//						],
//					]);
					Modal::end();
					?>


					<?= DetailView::widget([
						'model' => $model,
						'mode'=>DetailView::MODE_EDIT,
						'attributes' => [
							'id',
							'name',
							'age',
						],
					]) ?>

				</div>
			</div>
		</div>
	</div>
</div>
