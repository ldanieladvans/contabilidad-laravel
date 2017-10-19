@extends('templates.layout')

@section('app_css')
	@parent
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('DevExtreme/Sources/Lib/css/dx.spa.css') }}" />-->
    <link rel="stylesheet" href="{{ asset('ac_theme/assets/css/dropzone.min.css') }}" />
    <link href="{{ asset('js/select2/dist/css/select2.css') }}" rel="stylesheet">

    <style type="text/css">
    	#listaContainer {
		  display:flex;
		  justify-content: center;
		  padding: 3px;
		}
		#listaContainer > div {
		  margin:2px;
		}
    </style>
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	    <ul class="breadcrumb">
	        <li>
	            <i class="ace-icon fa fa-group home-icon"></i>
	            <a href="#">Configurar Contabilidad</a>
	        </li>
	    </ul>
	</div>
@endsection

@section('page_header_content')
	<div class="page-header">
	    @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" id="alertmsgcta" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>{{ Session::get('message') }}</strong>
            </div>
        @endif
	</div>
@endsection

@section('variable_content')
	<div class="row">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<h4 class="widget-title lighter">Asistente de configuración</h4>

				
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div id="fuelux-wizard-container">
						<div>
							<ul class="steps">
								<li data-step="1" class="active">
									<span class="step">1</span>
									<span class="title">Cuentas para clientes</span>
								</li>

								<li data-step="2">
									<span class="step">2</span>
									<span class="title">Cuentas para proveedores</span>
								</li>

								<li data-step="3">
									<span class="step">3</span>
									<span class="title">Plan contable</span>
								</li>

								<li data-step="4">
									<span class="step">4</span>
									<span class="title">Confirmación</span>
								</li>
							</ul>
						</div>

						<hr />

						<div class="step-content pos-rel">
							<div class="step-pane active" data-step="1">
								<h3 class="lighter block green">Enter the following information</h3>

								<form class="form-horizontal" id="validation-form" method="get">
									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Email Address:</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="email" name="email" id="email" class="col-xs-12 col-sm-6" />
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Password:</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="password" name="password" id="password" class="col-xs-12 col-sm-4" />
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Confirm Password:</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="password" name="password2" id="password2" class="col-xs-12 col-sm-4" />
											</div>
										</div>
									</div>

									<div class="hr hr-dotted"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Company Name:</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="text" id="name" name="name" class="col-xs-12 col-sm-5" />
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="phone">Phone Number:</label>

										<div class="col-xs-12 col-sm-9">
											<div class="input-group">
												<span class="input-group-addon">
													<i class="ace-icon fa fa-phone"></i>
												</span>

												<input type="tel" id="phone" name="phone" />
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="url">Company URL:</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<input type="url" id="url" name="url" class="col-xs-12 col-sm-8" />
											</div>
										</div>
									</div>

									<div class="hr hr-dotted"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Subscribe to</label>

										<div class="col-xs-12 col-sm-9">
											<div>
												<label>
													<input name="subscription" value="1" type="checkbox" class="ace" />
													<span class="lbl"> Latest news and announcements</span>
												</label>
											</div>

											<div>
												<label>
													<input name="subscription" value="2" type="checkbox" class="ace" />
													<span class="lbl"> Product offers and discounts</span>
												</label>
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right">Gender</label>

										<div class="col-xs-12 col-sm-9">
											<div>
												<label class="line-height-1 blue">
													<input name="gender" value="1" type="radio" class="ace" />
													<span class="lbl"> Male</span>
												</label>
											</div>

											<div>
												<label class="line-height-1 blue">
													<input name="gender" value="2" type="radio" class="ace" />
													<span class="lbl"> Female</span>
												</label>
											</div>
										</div>
									</div>

									<div class="hr hr-dotted"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="state">State</label>

										<div class="col-xs-12 col-sm-9">
											<select id="state" name="state" class="select2" data-placeholder="Click to Choose...">
												<option value="">&nbsp;</option>
												<option value="AL">Alabama</option>
												<option value="AK">Alaska</option>
												<option value="AZ">Arizona</option>
												<option value="AR">Arkansas</option>
												<option value="CA">California</option>
												<option value="CO">Colorado</option>
												<option value="CT">Connecticut</option>
												<option value="DE">Delaware</option>
												<option value="FL">Florida</option>
												<option value="GA">Georgia</option>
												<option value="HI">Hawaii</option>
												<option value="ID">Idaho</option>
												<option value="IL">Illinois</option>
												<option value="IN">Indiana</option>
												<option value="IA">Iowa</option>
												<option value="KS">Kansas</option>
												<option value="KY">Kentucky</option>
												<option value="LA">Louisiana</option>
												<option value="ME">Maine</option>
												<option value="MD">Maryland</option>
												<option value="MA">Massachusetts</option>
												<option value="MI">Michigan</option>
												<option value="MN">Minnesota</option>
												<option value="MS">Mississippi</option>
												<option value="MO">Missouri</option>
												<option value="MT">Montana</option>
												<option value="NE">Nebraska</option>
												<option value="NV">Nevada</option>
												<option value="NH">New Hampshire</option>
												<option value="NJ">New Jersey</option>
												<option value="NM">New Mexico</option>
												<option value="NY">New York</option>
												<option value="NC">North Carolina</option>
												<option value="ND">North Dakota</option>
												<option value="OH">Ohio</option>
												<option value="OK">Oklahoma</option>
												<option value="OR">Oregon</option>
												<option value="PA">Pennsylvania</option>
												<option value="RI">Rhode Island</option>
												<option value="SC">South Carolina</option>
												<option value="SD">South Dakota</option>
												<option value="TN">Tennessee</option>
												<option value="TX">Texas</option>
												<option value="UT">Utah</option>
												<option value="VT">Vermont</option>
												<option value="VA">Virginia</option>
												<option value="WA">Washington</option>
												<option value="WV">West Virginia</option>
												<option value="WI">Wisconsin</option>
												<option value="WY">Wyoming</option>
											</select>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="platform">Platform</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<select class="input-medium" id="platform" name="platform">
													<option value="">------------------</option>
													<option value="linux">Linux</option>
													<option value="windows">Windows</option>
													<option value="mac">Mac OS</option>
													<option value="ios">iOS</option>
													<option value="android">Android</option>
												</select>
											</div>
										</div>
									</div>

									<div class="space-2"></div>

									<div class="form-group">
										<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="comment">Comment</label>

										<div class="col-xs-12 col-sm-9">
											<div class="clearfix">
												<textarea class="input-xlarge" name="comment" id="comment"></textarea>
											</div>
										</div>
									</div>

									<div class="space-8"></div>

									<div class="form-group">
										<div class="col-xs-12 col-sm-4 col-sm-offset-3">
											<label>
												<input name="agree" id="agree" type="checkbox" class="ace" />
												<span class="lbl"> I accept the policy</span>
											</label>
										</div>
									</div>
								</form>
							</div>

							<div class="step-pane" data-step="2">
								<div>
									<div class="alert alert-success">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>

										<strong>
											<i class="ace-icon fa fa-check"></i>
											Well done!
										</strong>

										You successfully read this important alert message.
										<br />
									</div>

									<div class="alert alert-danger">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>

										<strong>
											<i class="ace-icon fa fa-times"></i>
											Oh snap!
										</strong>

										Change a few things up and try submitting again.
										<br />
									</div>

									<div class="alert alert-warning">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>
										<strong>Warning!</strong>

										Best check yo self, you're not looking too good.
										<br />
									</div>

									<div class="alert alert-info">
										<button type="button" class="close" data-dismiss="alert">
											<i class="ace-icon fa fa-times"></i>
										</button>
										<strong>Heads up!</strong>

										This alert needs your attention, but it's not super important.
										<br />
									</div>
								</div>
							</div>

							<div class="step-pane" data-step="3">
								<div class="center">
									<h3 class="blue lighter">This is step 3</h3>
								</div>
							</div>

							<div class="step-pane" data-step="4">
								<div class="center">
									<h3 class="green">Congrats!</h3>
									Your product is ready to ship! Click finish to continue!
								</div>
							</div>
						</div>
					</div>

					<hr />
					<div class="wizard-actions">
						<button class="btn btn-prev">
							<i class="ace-icon fa fa-arrow-left"></i>
							Prev
						</button>

						<button class="btn btn-success btn-next" data-last="Finish">
							Next
							<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
						</button>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div>
	</div>
@endsection

@section('app_js')
        @parent
        <!--<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>-->

        <script src="{{ asset('ac_theme/assets/js/wizard.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery-additional-methods.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/bootbox.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.maskedinput.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/select2.min.js') }}"></script>

        <!-- ace scripts -->
        <script src="{{ asset('ac_theme/assets/js/ace-elements.min.js') }}"></script>
        <script src="{{ asset('ac_theme/assets/js/ace.min.js') }}"></script>
        
        <script type="text/javascript">

			$('#fuelux-wizard-container')
			.ace_wizard({
				//step: 2 //optional argument. wizard will jump to step "2" at first
				//buttons: '.wizard-actions:eq(0)'
			})
			.on('actionclicked.fu.wizard' , function(e, info){
				console.log(info);
				if(info.step == 1) {
					if(!$('#validation-form').valid()) e.preventDefault();
				}
			})
			//.on('changed.fu.wizard', function() {
			//})
			.on('finished.fu.wizard', function(e) {
				bootbox.dialog({
					message: "Thank you! Your information was successfully saved!", 
					buttons: {
						"success" : {
							"label" : "OK",
							"className" : "btn-sm btn-primary"
						}
					}
				});
			}).on('stepclick.fu.wizard', function(e){
				//e.preventDefault();//this will prevent clicking and selecting steps
			});

			$.mask.definitions['~']='[+-]';
				$('#phone').mask('(999) 999-9999');
			
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");
			
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						email: {
							required: true,
							email:true
						},
						password: {
							required: true,
							minlength: 5
						},
						password2: {
							required: true,
							minlength: 5,
							equalTo: "#password"
						},
						name: {
							required: true
						},
						phone: {
							required: true,
							phone: 'required'
						},
						url: {
							required: true,
							url: true
						},
						comment: {
							required: true
						},
						state: {
							required: true
						},
						platform: {
							required: true
						},
						subscription: {
							required: true
						},
						gender: {
							required: true,
						},
						agree: {
							required: true,
						}
					},
			
					messages: {
						email: {
							required: "Please provide a valid email.",
							email: "Please provide a valid email."
						},
						password: {
							required: "Please specify a password.",
							minlength: "Please specify a secure password."
						},
						state: "Please choose state",
						subscription: "Please choose at least one option",
						gender: "Please choose gender",
						agree: "Please accept our policy"
					},
			
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is('input[type=checkbox]') || element.is('input[type=radio]')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});

        </script>
@endsection