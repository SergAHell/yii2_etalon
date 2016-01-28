<style>
	.control-sidebar-bg, .control-sidebar {
		right: -25%;
		width: 25%;
	}
</style>
<aside class="control-sidebar control-sidebar-dark">

	<ul class="nav nav-tabs nav-justified control-sidebar-tabs">
		<li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
		<li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		<li><a href="#control-sidebar-stats-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		<li><a href="#control-sidebar-stats1-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
		<li><a href="#control-sidebar-stats2-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
	</ul>

	<div class="tab-content">
		<div class="tab-pane active" id="control-sidebar-home-tab">
			<h3 class="control-sidebar-heading">Recent Activity</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript::;">
						<i class="menu-icon fa fa-birthday-cake bg-red"></i>

						<div class="menu-info">
							<h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

							<p>Will be 23 on April 24th</p>
						</div>
					</a>
				</li>
			</ul>

			<h3 class="control-sidebar-heading">Tasks Progress</h3>
			<ul class="control-sidebar-menu">
				<li>
					<a href="javascript::;">
						<h4 class="control-sidebar-subheading">
							Custom Template Design
							<span class="label label-danger pull-right">70%</span>
						</h4>

						<div class="progress progress-xxs">
							<div class="progress-bar progress-bar-danger" style="width: 70%"></div>
						</div>
					</a>
				</li>
			</ul>

		</div>

		<div class="tab-pane" id="control-sidebar-settings-tab">
			<form method="post">
				<h3 class="control-sidebar-heading">General Settings</h3>

				<div class="form-group">
					<label class="control-sidebar-subheading">
						Report panel usage
						<input type="checkbox" class="pull-right" checked="">
					</label>

					<p>
						Some information about this general settings option
					</p>
				</div>

			</form>
		</div>

		<div class="tab-pane" id="control-sidebar-stats-tab"><h3 class="control-sidebar-heading">Stats Tab Content</h3></div>
		<div class="tab-pane" id="control-sidebar-stats1-tab"><h3 class="control-sidebar-heading">Stats 1 Tab Content</h3></div>
		<div class="tab-pane" id="control-sidebar-stats2-tab"><h3 class="control-sidebar-heading">Stats 2 Tab Content</h3></div>
	</div>
</aside>
<div class="control-sidebar-bg" style="position: fixed; height: auto; "></div>