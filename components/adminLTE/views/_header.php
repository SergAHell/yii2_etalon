<header class="main-header">

	<?php if ($base->isHeader) {?>
	<a href="/" class="logo">
		<?=$base->adminName['short']?>
		<?=$base->adminName['long']?>
	</a>

	<nav class="navbar navbar-static-top" role="navigation">
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
			<span class="sr-only">Toggle navigation</span>
		</a>
		<div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
				<?php
					foreach($base->headDropDown as $i){
						echo $i;
					}
				?>
				
				
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img src="/img/user2-160x160.jpg" class="user-image" alt="User Image">
						<span class="hidden-xs"><?= Yii::$app->user->isGuest ? 'guest' : Yii::$app->user->identity->username ?></span>
					</a>
					<ul class="dropdown-menu">
						<li class="user-header">
							<img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">

							<p>
								<?= Yii::$app->user->isGuest ? 'guest@email' : Yii::$app->user->identity->email ?>
								<small>admin</small>
							</p>
						</li>
						<li class="user-body">
							<div class="row">
								<div class="col-xs-4 text-center">
									<a href="#">Followers</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#">Sales</a>
								</div>
								<div class="col-xs-4 text-center">
									<a href="#">Friends</a>
								</div>
							</div>
						</li>
						<li class="user-footer">
							<div class="pull-left">
								<a href="#" class="btn btn-default btn-flat">Профиль</a>
							</div>
						<div class="pull-right">
								<a href="/site/logout" class="btn btn-default btn-flat" data-method="post">Выйти</a>
							</div>
						</li>
					</ul>
				</li>
				<?php if ($base->isRight) { ?>
				<li>
					<a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
				</li>
				<?php } ?>
			</ul>
		</div>
	</nav>
	<?php } ?>
</header>