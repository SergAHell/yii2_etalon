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

$this->title = 'Редактирование: ' . $model->name;
$pageHeader = 'Update!';

$this->params['breadcrumbs'][] = ['label' => 'Tests', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row">
	<div class="col-lg-12">
		<div class="box box-primary">
			<div class="box-header">

			</div>
			<div class="box-body">
				<div class="test-update">
					<?= $this->render('_form', [
						'model' => $model,
					]) ?>
				</div>

				<?php
				Modal::begin([
					'header' => '<h4 class="modal-title">Detail View Demo</h4>',
					'toggleButton' => ['label' => '<i class="glyphicon glyphicon-th-list"></i> Detail View in Modal', 'class' => 'btn btn-primary']
				]);
				echo DetailView::widget([
					'model' => $model,
					'mode'=>DetailView::MODE_EDIT,
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

				Modal::end();
				?>
				
				
			</div>
		</div>
	</div>
</div>
