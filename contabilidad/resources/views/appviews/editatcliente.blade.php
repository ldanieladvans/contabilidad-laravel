@extends('templates.layout')

@section('app_css')
	@parent
	<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/jquery-ui.custom.min.css') }}" />
	<link href="{{ asset('js/select2/dist/css/select2.css') }}" rel="stylesheet">
	<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/bootstrap-datepicker3.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/bootstrap-timepicker.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/daterangepicker.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/bootstrap-datetimepicker.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/bootstrap-colorpicker.min.css') }}" />
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	    <ul class="breadcrumb">
	        <li>
	            <i class="ace-icon fa fa-group home-icon"></i>
	            <a href="#">Actualizar Tipo Cliente</a>
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
		<!-- Inputs para guardar los datos adicionales del cliente -->			
		
		<!-- Div contenedor del formulario -->
			<div class="col-xs-12">
				<!-- PAGE CONTENT BEGINS -->
				{{ Form::open(['route' => ['tclientes.update', $tcliente->id], 'class'=>'form-horizontal form-label-left', 'method'=>'PUT', 'id'=>'editatcliente']) }}
                	{{ Form::hidden('_method', 'PUT') }}
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-2 col-md-2" for="tipcliente_desc">Nombre/Descripción:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="tipcliente_desc" id="tipcliente_desc" class="col-md-10 col-sm-10 col-xs-12" value="{{$tcliente->tipcliente_desc}}"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">



							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab">

									<li class="active">
										<a data-toggle="tab" href="#messages">
											<i class="green ace-icon fa fa-bank bigger-120"></i>
											Contabilidad
										</a>
									</li>

								</ul>



								<div class="tab-content">

									<div id="messages" class="tab-pane fade in active">
										<table width="100%">
											<tr>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-2 col-md-2" for="tipcliente_concpto_polz">Concepto Póliza:</label>
														<div class="col-md-10 col-sm-10 col-xs-12">
															<div class="clearfix">
																<input type="text" name="tipcliente_concpto_polz" id="tipcliente_concpto_polz" class="col-md-10 col-sm-10 col-xs-12" value="{{$tcliente->tipcliente_concpto_polz}}"/>
															</div>
														</div>
													</div>
												</td>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipcliente_cta_anticp_client_id">Cuenta de anticipo:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="tipcliente_cta_anticp_client_id" id="tipcliente_cta_anticp_client_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($tipcliente_cta_anticp_client_id as $ccac)
								                            	<option value="{{ $ccac->id }}" {{$cliente->tipcliente_cta_anticp_client_id == $ccac->id ? 'selected':''}}>{{ $ccac->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
											</tr>
											<tr>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipcliente_cta_ingreso_id">Cuenta de ingreso:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="tipcliente_cta_ingreso_id" id="tipcliente_cta_ingreso_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($tipcliente_cta_ingreso_id as $cci)
								                            	<option value="{{ $cci->id }}" {{$cliente->tipcliente_cta_ingreso_id == $cci->id ? 'selected':''}}>{{ $cci->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-4 col-xs-12" for="tipcliente_cta_desc_id">Cuenta de descuento:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="tipcliente_cta_desc_id" id="tipcliente_cta_desc_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($tipcliente_cta_desc_id as $ccd)
								                            	<option value="{{ $ccd->id }}" {{$cliente->tipcliente_cta_desc_id == $ccd->id ? 'selected':''}}>{{ $ccd->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
											</tr>
											<tr>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipcliente_cta_iva_traslad_x_cob_id">Cuenta IVA trasladado por cobrar:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="tipcliente_cta_iva_traslad_x_cob_id" id="tipcliente_cta_iva_traslad_x_cob_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($tipcliente_cta_iva_traslad_x_cob_id as $ccitxc)
								                            	<option value="{{ $ccitxc->id }}" {{$cliente->tipcliente_cta_iva_traslad_x_cob_id == $ccitxc->id ? 'selected':''}}>{{ $ccitxc->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-4 col-xs-12" for="tipcliente_cta_iva_traslad_cob_id">Cuenta IVA trasladado cobrado:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="tipcliente_cta_iva_traslad_cob_id" id="tipcliente_cta_iva_traslad_cob_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($tipcliente_cta_iva_traslad_cob_id as $ccitc)
								                            	<option value="{{ $ccitc->id }}" {{$cliente->tipcliente_cta_iva_traslad_cob_id == $ccitc->id ? 'selected':''}}>{{ $ccitc->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
											</tr>
											<tr>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipcliente_cta_iva_reten_x_cob_id">Cuenta IVA trasladado por cobrar:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="tipcliente_cta_iva_reten_x_cob_id" id="tipcliente_cta_iva_reten_x_cob_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($tipcliente_cta_iva_reten_x_cob_id as $ccirxc)
								                            	<option value="{{ $ccirxc->id }}" {{$cliente->tipcliente_cta_iva_reten_x_cob_id == $ccirxc->id ? 'selected':''}}>{{ $ccirxc->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-4 col-xs-12" for="tipcliente_cta_iva_reten_cob_id">Cuenta IVA trasladado cobrado:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="tipcliente_cta_iva_reten_cob_id" id="tipcliente_cta_iva_reten_cob_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($tipcliente_cta_iva_reten_cob_id as $ccirc)
								                            	<option value="{{ $ccirc->id }}" {{$cliente->tipcliente_cta_iva_reten_cob_id == $ccirc->id ? 'selected':''}}>{{ $ccirc->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
											</tr>
											<tr>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="tipcliente_cta_isr_reten_id">Cuenta ISR retenido:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="tipcliente_cta_isr_reten_id" id="tipcliente_cta_isr_reten_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($tipcliente_cta_isr_reten_id as $ccir)
								                            	<option value="{{ $ccir->id }}" {{$cliente->tipcliente_cta_isr_reten_id == $ccir->id ? 'selected':''}}>{{ $ccir->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-4 col-xs-12" for="tipcliente_cta_por_cobrar_id">Cuenta por cobrar:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="tipcliente_cta_por_cobrar_id" id="tipcliente_cta_por_cobrar_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($tipcliente_cta_por_cobrar_id as $ccpc)
								                            	<option value="{{ $ccpc->id }}" {{$cliente->tipcliente_cta_por_cobrar_id == $ccpc->id ? 'selected':''}}>{{ $ccpc->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
											</tr>
										</table>
									</div>

								</div>
							</div>
						</div>
					</div>

					<hr />
					<hr />

					<div class="ln_solid"></div>
                        <div class="form-group">
	                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
	                            <button id="cancel" type="button" onclick="location.href = '/tclientes';" class="btn btn-info">Cancelar</button>
	                  		    <button id="send" type="submit" class="btn btn-success">Guardar</button>
	                        </div>
                        </div>

				{{ Form::close() }}

			</div>
	</div>
@endsection

@section('app_js')
        @parent
        <script src="{{ asset('ac_theme/assets/js/wizard.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery-additional-methods.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.maskedinput.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/select2.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/bootstrap-tag.min.js') }}"></script>
		<!-- tables -->
		<script src="{{ asset('ac_theme/assets/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>

		<script src="{{ asset('ac_theme/assets/js/dataTables.select.min.js') }}"></script>
		<!-- ace scripts -->
		<script src="{{ asset('ac_theme/assets/js/ace-elements.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/ace.min.js') }}"></script>

		<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>


		<script type="text/javascript">

			var dom_estado_serv = '';
	    	var dom_munic_serv = '';
	    	var dom_cp_serv = '';
	    	var dom_munic_text = '';
	    	var dtobj = null;

			//$('#loadingmodal').modal('show');

			/* Marcando el menú seleccionado */
	        	$.each(document.getElementById("menus").getElementsByTagName("li"), function( index, value ) {
				  value.classList.remove("active");
				});
	        	$("#menutipocliente").addClass('active');
	        	$("#menudirectorio").addClass('open');
	        	$("#menucategorias").addClass('open');

        	/*Inicializando selects*/

				$("#tipcliente_cta_ingreso_id").select2({
				  	placeholder: "Selecciona la cuenta de ingreso",
				  	allowClear: true
				});

				$("#tipcliente_cta_desc_id").select2({
				  	placeholder: "Selecciona la cuenta de descuento",
				  	allowClear: true
				});

				$("#tipcliente_cta_iva_traslad_x_cob_id").select2({
				  	placeholder: "Selecciona la cuenta de IVA trasladado por cobrar",
				  	allowClear: true
				});

				$("#tipcliente_cta_iva_traslad_cob_id").select2({
				  	placeholder: "Selecciona la cuenta de IVA trasladado cobrado",
				  	allowClear: true
				});

				$("#tipcliente_cta_iva_reten_x_cob_id").select2({
				  	placeholder: "Selecciona la cuenta de IVA retenido por cobrar",
				  	allowClear: true
				});

				$("#tipcliente_cta_iva_reten_cob_id").select2({
				  	placeholder: "Selecciona la cuenta de IVA retenido cobrado",
				  	allowClear: true
				});

				$("#tipcliente_cta_isr_reten_id").select2({
				  	placeholder: "Selecciona la cuenta de ISR retenido",
				  	allowClear: true
				});

				$("#tipcliente_cta_por_cobrar_id").select2({
				  	placeholder: "Selecciona la cuenta por cobrar",
				  	allowClear: true
				});

				$("#tipcliente_cta_anticp_client_id").select2({
				  	placeholder: "Selecciona la cuenta de anticipo",
				  	allowClear: true
				});
			
		
			$('#editatcliente').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				ignore: "",
				rules: {
					tipcliente_desc: {
						required: true
					}
				},
		
				messages: {
					tipcliente_desc: {
						required: "Este campo es requerido."
					}
				},
		
		
				highlight: function (e) {
					$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
				},
		
				success: function (e) {
					$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
					$(e).remove();
				},
		
				errorPlacement: function (error, element) {
					console.log(error);
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
					form.submit();
				},
				invalidHandler: function (form) {
					console.log('2');
				}
			});

		</script>

@endsection