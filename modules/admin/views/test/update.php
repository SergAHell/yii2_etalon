<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

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
			</div>
		</div>
	</div>
</div>
