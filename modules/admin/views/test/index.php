<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $searchModel app\models\TestSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список: ' ;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="test-index">

	<div class="row">
		<div class="col-lg-9">
			<div class="box box-primary">
				<div class="box-header">
					<p>
						<?= Html::a('Create Test', ['create'], ['class' => 'btn btn-success btn-flat']) ?>
					</p>
				</div>
				<div class="box-body">

					<?= GridView::widget([
						'dataProvider' => $dataProvider,
//						'filterModel' => $searchModel,
						'columns' => [
							['class' => 'yii\grid\SerialColumn'],
//							'id',
							'name',
							'age',
							['class' => 'yii\grid\ActionColumn'],
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
				<div class="box-body no-padding_">
					<?php echo $this->render('_search', ['model' => $searchModel]); ?>
				</div>
			</div>
		</div>
	</div>
</div>
