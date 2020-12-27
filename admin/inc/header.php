<?php
include 'config/Session.php';
Session::checkSession();
include 'config/Database.php';
$db = new Database();
?>
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner ">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="index.html">
				<img src="../assets/layouts/layout4/img/logo-light.png" alt="logo" class="logo-default" />
			</a>
			<div class="menu-toggler sidebar-toggler">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
		<!-- END RESPONSIVE MENU TOGGLER -->

		<!-- BEGIN PAGE TOP -->
		<div class="page-top">
			<!-- BEGIN HEADER SEARCH BOX -->
			<!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
			<form class="search-form" action="page_general_search_2.html" method="GET">
				<div class="input-group">
					<input type="text" class="form-control input-sm" placeholder="Search..." name="query">
					<span class="input-group-btn">
						<a href="javascript:;" class="btn submit">
							<i class="icon-magnifier"></i>
						</a>
					</span>
				</div>
			</form>
			<!-- END HEADER SEARCH BOX -->
			<!-- BEGIN TOP NAVIGATION MENU -->
			<div class="top-menu">
				<ul class="nav navbar-nav pull-right">
					<li class="separator hide"> </li>
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown dropdown-extended dropdown-notification dropdown-dark" id="header_notification_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-bell"></i>
							<span class="badge badge-success"> 7 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3><span class="bold">12 pending</span> notifications</h3>
								<a href="page_user_profile_1.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 250px;" data-handle-color="#637283">
									<li>
										<a href="javascript:;">
											<span class="time">just now</span>
											<span class="details">
												<span class="label label-sm label-icon label-success">
													<i class="fa fa-plus"></i>
												</span> New user registered.
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">3 mins</span>
											<span class="details">
												<span class="label label-sm label-icon label-danger">
													<i class="fa fa-bolt"></i>
												</span> Server #12 overloaded. 
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">10 mins</span>
											<span class="details">
												<span class="label label-sm label-icon label-warning">
													<i class="fa fa-bell-o"></i>
												</span> Server #2 not responding. 
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="time">14 hrs</span>
											<span class="details">
												<span class="label label-sm label-icon label-info">
													<i class="fa fa-bullhorn"></i>
												</span> Application error. 
											</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<li class="separator hide"> </li>
					<!-- BEGIN INBOX DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-inbox dropdown-dark" id="header_inbox_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-envelope-open"></i>
							<span class="badge badge-danger"> 4 </span>
						</a>
						<ul class="dropdown-menu">
							<li class="external">
								<h3>You have
									<span class="bold">7 New</span> Messages
								</h3>
								<a href="app_inbox.html">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="#">
											<span class="photo">
												<img src="../assets/layouts/layout3/img/avatar2.jpg" class="img-circle" alt=""> 
											</span>
											<span class="subject">
												<span class="from"> Lisa Wong </span>
												<span class="time">Just Now </span>
											</span>
											<span class="message"> Vivamus sed auctor nibh congue nibh. auctor nibh auctor nibh... </span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<li class="separator hide"> </li>
					<!-- BEGIN TODO DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-extended dropdown-tasks dropdown-dark" id="header_task_bar">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<i class="icon-calendar"></i>
							<span class="badge badge-primary"> 3 </span>
						</a>
						<ul class="dropdown-menu extended tasks">
							<li class="external">
								<h3>You have <span class="bold">12 pending</span> tasks</h3>
								<a href="?p=page_todo_2">view all</a>
							</li>
							<li>
								<ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
									<li>
										<a href="javascript:;">
											<span class="task">
												<span class="desc">New release v1.2 </span>
												<span class="percent">30%</span>
											</span>
											<span class="progress">
												<span style="width: 40%;" class="progress-bar progress-bar-success" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">40% Complete</span>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="task">
												<span class="desc">Application deployment</span>
												<span class="percent">65%</span>
											</span>
											<span class="progress">
												<span style="width: 65%;" class="progress-bar progress-bar-danger" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">65% Complete</span>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="task">
												<span class="desc">Mobile app release</span>
												<span class="percent">98%</span>
											</span>
											<span class="progress">
												<span style="width: 98%;" class="progress-bar progress-bar-success" aria-valuenow="98" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">98% Complete</span>
												</span>
											</span>
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<span class="task">
												<span class="desc">Database migration</span>
												<span class="percent">10%</span>
											</span>
											<span class="progress">
												<span style="width: 10%;" class="progress-bar progress-bar-warning" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
													<span class="sr-only">10% Complete</span>
												</span>
											</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</li>
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
					<li class="dropdown dropdown-user dropdown-dark">
						<a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
							<span class="username username-hide-on-mobile"> <?php echo Session::get('email'); ?> </span>
							<!-- DOC: Do not remove below empty space(&nbsp;) as its purposely used -->
							<img alt="" class="img-circle" src="../assets/layouts/layout4/img/avatar9.jpg" />
						</a>
						<ul class="dropdown-menu dropdown-menu-default">
							<li>
								<a href="#">
									<i class="icon-user"></i> My Profile
								</a>
							</li>
							<li>
								<a href="logout.php?action=logout">
									<i class="icon-key"></i> Log Out
								</a>
							</li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
					<!-- BEGIN QUICK SIDEBAR TOGGLER -->
					<!-- <li class="dropdown dropdown-extended quick-sidebar-toggler">
						<span class="sr-only">Toggle Quick Sidebar</span>
						<i class="icon-logout"></i>
					</li> -->
					<!-- END QUICK SIDEBAR TOGGLER -->
				</ul>
			</div>
			<!-- END TOP NAVIGATION MENU -->
		</div>
		<!-- END PAGE TOP -->
	</div>
	<!-- END HEADER INNER -->
</div>