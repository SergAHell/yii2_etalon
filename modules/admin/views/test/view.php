<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;

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

					<?= DetailView::widget([
						'model' => $model,
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
