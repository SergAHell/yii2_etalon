<aside class="main-sidebar">
	<?php if (!Yii::$app->user->isGuest) {?>
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

		<!-- Sidebar user panel (optional) -->
<!--		<div class="user-panel">
			<div class="pull-left image">
				<img src="/img/user2-160x160.jpg" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p>Alexander Pierce</p>
				<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div>
-->
		<!-- search form (Optional) -->
<!--		<form action="#" method="get" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
				</button>
              </span>
			</div>
		</form>
-->		<!-- /.search form -->

		<!-- Sidebar Menu -->
		<ul class="sidebar-menu">
			<li class="header">HEADER</li>
			<li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
			<li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
			<li class="treeview">
				<a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li><a href="#"><i class="fa fa-link"></i> Link in level 2</a></li>
					<li><a href="#"><i class="fa fa-link"></i> Link in level 2</a></li>
				</ul>
			</li>
			<li class="treeview active">
				<a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
				<ul class="treeview-menu">
					<li class="active"><a href="/admin/test"><i class="fa fa-link"></i> test</a></li>
					<li><a href="#"><i class="fa fa-link"></i> Link in level 2</a></li>
					<li class="treeview  active">
						<a href="#"><i class="fa fa-link"></i> <span>Multilevel</span> <i class="fa fa-angle-left pull-right"></i></a>
						<ul class="treeview-menu">
							<li><a href="#"><i class="fa fa-link"></i> Link in level 2</a></li>
							<li><a href="#"><i class="fa fa-link"></i> Link in level 2</a></li>
						</ul>
					</li>

				</ul>
			</li>
		</ul>
		<!-- /.sidebar-menu -->
	</section>
	<!-- /.sidebar -->
	<?php } ?>
</aside>	