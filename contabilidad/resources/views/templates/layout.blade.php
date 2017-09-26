@extends('templates.base')

@section('app_title','Contabilidad')
	
@section('app_css')
	@parent

@endsection

@section('app_body')
	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default          ace-save-state">
			<div class="navbar-container ace-save-state" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-bank"></i>
							{{ config('app.name') }}
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">

						<li class="light-blue dropdown-modal">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<!-- TODO Img -->
								<!--<img class="nav-user-photo" src="{{ asset('favicon.ico') }}" alt="Jason's Photo" />-->
								<span class="user-info">
									<small>Welcome,</small>
									{{Auth::user()->name}}
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">

								<li>
									<a href="profile.html">
										<i class="ace-icon fa fa-user"></i>
										Profile
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="{{ route('logout') }}"
			                                            onclick="event.preventDefault();
			                                                     document.getElementById('logout-form').submit();">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
									<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>

		<div class="main-container ace-save-state" id="main-container">
			<script type="text/javascript">
				try{ace.settings.loadState('main-container')}catch(e){}
			</script>

			<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
				<script type="text/javascript">
					try{ace.settings.loadState('sidebar')}catch(e){}
				</script>

				<ul id="menus" class="nav nav-list">
					<li id="menuinicio" class="">
						<a href="index.html">
							<i class="menu-icon fa fa-home"></i>
							<span class="menu-text"> INICIO </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li id="menudirectorio" class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-group"></i>
							<span class="menu-text">
								DIRECTORIO
							</span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">

							<li id="menucliente" class="">
								<a href="{{ route('clientes.index') }}">
									<i class="menu-icon fa fa-caret-right"></i>
									CLIENTES
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="#">
									<i class="menu-icon fa fa-caret-right"></i>
									PROVEEDORES
								</a>

								<b class="arrow"></b>
							</li>
						</ul>
					</li>
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>
			</div>

			<div class="main-content">
				@section('app_content')
					<div class="main-content-inner">
						@section('breadcrumbs')
		                <div class="breadcrumbs ace-save-state" id="breadcrumbs">
		                    <ul class="breadcrumb">
		                        <li>
		                            <i class="ace-icon fa fa-home home-icon"></i>
		                            <a href="#">Home</a>
		                        </li>
		                        <li class="active">Dashboard</li>
		                    </ul><!-- /.breadcrumb -->

		                </div>
			            @show

			            @section('general_content')
			            <div class="page-content">
			                @section('settings_content')
			                <div class="ace-settings-container" id="ace-settings-container">
			                    <div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
			                        <i class="ace-icon fa fa-cog bigger-130"></i>
			                    </div>

			                    <div class="ace-settings-box clearfix" id="ace-settings-box">
			                        <div class="pull-left width-50">
			                            <div class="ace-settings-item">
			                                <div class="pull-left">
			                                    <select id="skin-colorpicker" class="hide">
			                                        <option data-skin="no-skin" value="#438EB9">#438EB9</option>
			                                        <option data-skin="skin-1" value="#222A2D">#222A2D</option>
			                                        <option data-skin="skin-2" value="#C6487E">#C6487E</option>
			                                        <option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
			                                    </select>
			                                </div>
			                                <span>&nbsp; Choose Skin</span>
			                            </div>

			                            <div class="ace-settings-item">
			                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
			                                <label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
			                            </div>

			                            <div class="ace-settings-item">
			                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
			                                <label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
			                            </div>

			                            <div class="ace-settings-item">
			                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
			                                <label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
			                            </div>

			                            <div class="ace-settings-item">
			                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
			                                <label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
			                            </div>

			                            <div class="ace-settings-item">
			                                <input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
			                                <label class="lbl" for="ace-settings-add-container">
			                                    Inside
			                                    <b>.container</b>
			                                </label>
			                            </div>
			                        </div><!-- /.pull-left -->

			                        <div class="pull-left width-50">
			                            <div class="ace-settings-item">
			                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
			                                <label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
			                            </div>

			                            <div class="ace-settings-item">
			                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
			                                <label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
			                            </div>

			                            <div class="ace-settings-item">
			                                <input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
			                                <label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
			                            </div>
			                        </div><!-- /.pull-left -->
			                    </div><!-- /.ace-settings-box -->
			                </div><!-- /.ace-settings-container -->
			                @show

			                @section('page_header_content')
			                <div class="page-header">
			                    <h1>
			                        Dashboard
			                        <small>
			                            <i class="ace-icon fa fa-angle-double-right"></i>
			                            overview &amp; stats
			                        </small>
			                    </h1>
			                </div><!-- /.page-header -->
			                @show

			                @yield('variable_content')
			            </div><!-- /.page-content -->
			        </div>
        			@show
					</div>
				@show
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Advans</span>
							&copy; 2017-2018
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a>
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->


	@section('app_js')
		<script src="{{ asset('ac_theme/assets/js/jquery-2.1.4.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery-ui.custom.min.js') }}"></script>
        <script src="{{ asset('ac_theme/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
	@show
	</body>
@endsection