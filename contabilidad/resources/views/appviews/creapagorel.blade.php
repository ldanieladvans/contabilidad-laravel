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
	            <a href="#">Crear Pago Relacionado</a>
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
				<form class="form-horizontal" action="{{ route('pagosrel.store') }}" method='POST' id="creapagorel">
					{{ csrf_field() }}

					<input type="hidden" name="pagorel_metpago_nom" id="pagorel_metpago_nom" value="">
					<input type="hidden" name="pagorel_moneda_nom" id="pago_moneda_nom" value="">

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pagorel_pagado_uuid">Pago UUID:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="pagorel_pagado_uuid" id="pagorel_pagado_uuid" class="col-md-10 col-sm-10 col-xs-12"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pagorel_serie">Serie:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="pagorel_serie" id="pagorel_serie" class="col-md-12 col-sm-12 col-xs-12"/>
							</div>
						</div>

						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pagorel_folio">Folio:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="pagorel_folio" id="pagorel_folio" class="col-md-10 col-sm-10 col-xs-12"/>
							</div>
						</div>
					</div>



					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="pagorel_metpago_cod">Forma de pago SAT:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="pagorel_metpago_cod" name="pagorel_metpago_cod" data-placeholder="Seleccione la forma de pago SAT ..." style="width: 83%; display: none;">
								@foreach($pagorel_metpago_cod as $tp)
	                            	<option value="{{ $tp->id }}">{{ $tp->tiposubcta_nom }}</option>
	                            @endforeach
							</select>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="pagorel_moneda_cod">Moneda:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="pagorel_moneda_cod" name="pagorel_moneda_cod" data-placeholder="Seleccione la moneda ..." style="width: 83%; display: none;">
									@foreach($pagorel_moneda_cod as $tp)
		                            	<option value="{{ $tp->id }}">{{ $tp->tiposubcta_nom }}</option>
		                            @endforeach
							</select>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pagorel_tipo_cambio">Tipo de Cambio:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="number" name="pagorel_tipo_cambio" id="pagorel_tipo_cambio" class="col-md-12 col-sm-12 col-xs-12"/>
							</div>
						</div>

						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pagorel_numparcldad">Parcialidad:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="number" name="pagorel_numparcldad" id="pagorel_numparcldad" class="col-md-10 col-sm-10 col-xs-12"/>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pagorel_sald_ant">Saldo Anterior:</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<div class="clearfix">
								<input type="number" name="pagorel_sald_ant" id="pagorel_sald_ant" class="col-md-12 col-sm-12 col-xs-12"/>
							</div>
						</div>

						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pagorel_monto_pag">Monto:</label>
						<div class="col-md-2 col-sm-2 col-xs-12">
							<div class="clearfix">
								<input type="number" name="pagorel_monto_pag" id="pagorel_monto_pag" class="col-md-12 col-sm-12 col-xs-12"/>
							</div>
						</div>

						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pagorel_sald_nuevo">Saldo Nuevo:</label>
						<div class="col-md-3 col-sm-3 col-xs-12">
							<div class="clearfix">
								<input type="number" name="pagorel_sald_nuevo" id="pagorel_sald_nuevo" class="col-md-9 col-sm-9 col-xs-12"/>
							</div>
						</div>
					</div>



					<div class="form-group">
						
					</div>

					<div class="form-group">
						
					</div>

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">



							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active">
										<a data-toggle="tab" href="#home">
											<i class="green ace-icon fa fa-bank bigger-120"></i>
											Contabilidad
										</a>
									</li>
								</ul>



								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										<div class="form-group">
											<label class="control-label col-md-1 col-sm-1 col-xs-12" for="pagorel_pago_id">Pago:</label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<select class="js-example-basic-single js-states form-control" id="pagorel_pago_id" name="pagorel_pago_id" data-placeholder="Seleccione el pago ..." style="width: 83%; display: none;">
													<option value="">Seleccione ...</option>
													@foreach($pagorel_pago_id as $tp)
						                            	<option value="{{ $tp->id }}">{{ $tp->pago_numoperc }}</option>
						                            @endforeach
												</select>
											</div>

											<label class="control-label col-md-1 col-sm-1 col-xs-12" for="pagorel_asiento_id">Asiento:</label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<select class="js-example-basic-single js-states form-control" id="pagorel_asiento_id" name="pagorel_asiento_id" data-placeholder="Seleccione el asiento ..." style="width: 83%; display: none;">
													<option value="">Seleccione ...</option>
													@foreach($pagorel_asiento_id as $tp)
						                            	<option value="{{ $tp->id }}">{{ $tp->asiento_folio_ref }}</option>
						                            @endforeach
												</select>
											</div>
										</div>
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
	                            <button id="cancel" type="button" onclick="location.href = '/pagosrel';" class="btn btn-info">Cancelar</button>
	                            <button type="reset" class="btn btn-primary">Borrar Datos</button>
	                  		    <button id="send" type="submit" class="btn btn-success">Guardar</button>
	                        </div>
                        </div>

				</form>

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
		<script src="{{ asset('ac_theme/assets/js/bootstrap-datepicker.min.js') }}"></script>
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
	        	$("#menupagorel").addClass('active');
	        	$("#menucontabilidad").addClass('open');

        	/*Inicializando selects*/
	        	$("#pagorel_metpago_cod").select2({
				  	placeholder: "Selecciona la forma de pago SAT ...",
				  	allowClear: true
				});

				$("#pagorel_moneda_cod").select2({
				  	placeholder: "Selecciona la moneda ...",
				  	allowClear: true
				});

				$("#pagorel_pago_id").select2({
				  	placeholder: "Selecciona el pago ...",
				  	allowClear: true
				});

				$("#pagorel_asiento_id").select2({
				  	placeholder: "Selecciona el asiento ...",
				  	allowClear: true
				});



	    	/*$.mask.definitions['~']='[+-]';
			$('#cliente_tel_contact').mask('(999) 999-9999');
			$('#cliente_tel_contact_otro').mask('(999) 999-9999');
			$('#cliente_tel').mask('(999) 999-9999');
		
			jQuery.validator.addMethod("cliente_rfc", function (value, element) {
				return this.optional(element) || /^[A-ZÑ&]{3,4}([0-9]{2})([0-1][0-9])([0-3][0-9])[A-Z0-9][A-Z0-9][0-9A]$/.test(value);
			}, "Introduzca un RFC válido.");*/
		
			/*$('#creapago').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				ignore: "",
				rules: {
					ctacont_num: {
						required: true
					},
					ctacont_natur: {
						required: true
					},
					ctacont_f_iniciosat: {
						required: true
					},
					ctacont_desc: {
						required: true
					}
				},
		
				messages: {
					ctacont_num: {
						required: "Este campo es requerido."
					},
					ctacont_natur: {
						required: "Este campo es requerido."
					},
					ctacont_f_iniciosat: {
						required: "Este campo es requerido."
					},
					ctacont_desc: {
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
			});*/


		$('#pagorel_metpago_cod').change(function(){
            document.getElementById('pagorel_metpago_nom').value = this.options[this.selectedIndex].text;            
        });

        $('#pagorel_moneda_nom').change(function(){
            document.getElementById('pagorel_moneda_nom').value = this.options[this.selectedIndex].text;            
        });

		</script>

@endsection