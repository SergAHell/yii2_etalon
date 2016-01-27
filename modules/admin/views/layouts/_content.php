<?php
die();

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
?>

<div class="content-wrapper" style="min-height: 894px;">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?=Html::encode($this->title)?>
			<small></small>
		</h1>
<!--		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
			<li class="active">Here</li>
		</ol>
-->	
		<?= Breadcrumbs::widget([
			'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
		]) ?>
	</section>

	<!-- Main content -->
	<section class="content">

		<!-- Your Page Content Here -->
		<?= $content?>

	</section>
	<!-- /.content -->
</div>