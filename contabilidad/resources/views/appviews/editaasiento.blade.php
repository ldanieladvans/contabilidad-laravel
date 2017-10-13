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
	            <a href="#">Actualizar Asiento</a>
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
				{{ Form::open(['route' => ['asientos.update', $asiento->id], 'class'=>'form-horizontal form-label-left', 'method'=>'PUT', 'id'=>'editaasiento']) }}
                	{{ Form::hidden('_method', 'PUT') }}


					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="asiento_concepto">Concepto:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="asiento_concepto" id="asiento_concepto" class="col-md-10 col-sm-10 col-xs-12" value="{{$asiento->asiento_concepto}}"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="asiento_debe">Debe:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="number" name="asiento_debe" id="asiento_debe" class="col-md-12 col-sm-12 col-xs-12" value="{{$asiento->asiento_debe}}"/>
							</div>
						</div>

						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="asiento_haber">Haber:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="number" name="asiento_haber" id="asiento_haber" class="col-md-10 col-sm-10 col-xs-12" value="{{$asiento->asiento_haber}}"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="asiento_folio_ref">Folio:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="asiento_folio_ref" id="asiento_folio_ref" class="col-md-10 col-sm-10 col-xs-12" value="{{$asiento->asiento_folio_ref}}"/>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="asiento_polz_id">Póliza:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="asiento_polz_id" name="asiento_polz_id" data-placeholder="Seleccione la póliza ..." style="width: 83%; display: none;">
                            	<option value="" >Seleccione ...</option>
                            	@foreach($polizas as $pol)
									<option value="{{ $pol->id }}" {{$asiento->asiento_polz_id == $pol->id ? 'selected':''}}>{{ $pol->polz_folio }}</option>
								@endforeach
							</select>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="asiento_ctacont_id">Cuenta:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="asiento_ctacont_id" name="asiento_ctacont_id" data-placeholder="Seleccione la cuenta ..." style="width: 83%; display: none;">
								<option value="" >Seleccione ...</option>
								@foreach($cuentas as $cta)
									<option value="{{ $cta->id }}" {{$asiento->asiento_ctacont_id == $cta->id ? 'selected':''}}>{{ $cta->ctacont_num }}</option>
								@endforeach
							</select>
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
											Chequeos
										</a>
									</li>

								</ul>



								<div class="tab-content">

									<div id="home" class="tab-pane fade in active">

										<div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="asiento_activo">Activo ?: </label>
											    <div class="col-md-2 col-sm-2 col-xs-12">
											    	<label>
														<input name="asiento_activo" id="asiento_activo" class="ace ace-switch" type="checkbox" {{$asiento->asiento_activo ? 'checked':''}} />
														<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
													</label>
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
	                            <button id="cancel" type="button" onclick="location.href = '/asientos';" class="btn btn-info">Cancelar</button>
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
	        	$("#menuasiento").addClass('active');
	        	$("#menucontabilidad").addClass('open');

        	/*Inicializando selects*/
	        	$("#asiento_polz_id").select2({
				  	placeholder: "Seleccione la póliza ...",
				  	allowClear: true
				});

				$("#asiento_ctacont_id").select2({
				  	placeholder: "Seleccione la cuenta ...",
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



		</script>

@endsection