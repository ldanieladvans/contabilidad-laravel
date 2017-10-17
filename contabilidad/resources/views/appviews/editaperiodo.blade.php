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
	            <a href="#">Crear Periodo</a>
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
				{{ Form::open(['route' => ['periodos.update', $periodo->id], 'class'=>'form-horizontal form-label-left', 'method'=>'PUT', 'id'=>'editaperiodo']) }}
                	{{ Form::hidden('_method', 'PUT') }}


					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="period_ejerc_id">Periodo:</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="period_ejerc_id" name="period_ejerc_id" data-placeholder="Seleccione el periodo ..." style="width: 83%; display: none;">
								<option value="">Seleccione ...</option>
								@foreach($period_ejerc_id as $pr)
	                            	<option value="{{ $pr->id }}" {{$periodo->period_ejerc_id == $pr->id ? 'selected':''}}>{{ $pr->ejerc_anio }}</option>
	                            @endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="period_fecha_ini">Fecha Inicio:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<input type="date" name="period_fecha_ini" id="period_fecha_ini" value="{{$periodo->period_fecha_ini}}"/>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="period_fecha_fin">Fecha Fin:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<input type="date" name="period_fecha_fin" id="period_fecha_fin" value="{{$periodo->period_fecha_fin}}"/>
						</div>
					</div>

					<div class="form-group">
						
					</div>

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">



							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active">
										<a data-toggle="tab" href="#home">
											<i class="green ace-icon fa fa-home bigger-120"></i>
											Chequeos
										</a>
									</li>
								</ul>



								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										
										<div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="period_cerrado">Periodo Cerrado ?: </label>
											    <div class="col-md-2 col-sm-2 col-xs-12">
											    	<label>
														<input name="period_cerrado" id="period_cerrado" class="ace ace-switch" type="checkbox" {{$periodo->period_cerrado ? 'checked':''}}/>
														<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
													</label>
												</div>

											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="period_de_cierre">Periodo de Cierre ?: </label>
										    <div class="col-md-2 col-sm-2 col-xs-12">
										    	<label>
													<input name="period_de_cierre" id="period_de_cierre" class="ace ace-switch" type="checkbox" {{$periodo->period_de_cierre ? 'checked':''}}/>
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
	                            <button id="cancel" type="button" onclick="location.href = '/periodos';" class="btn btn-info">Cancelar</button>
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
	        	$("#menuperiodo").addClass('active');
	        	$("#menucontabilidad").addClass('open');
	        	$("#menucontabilidadconfig").addClass('open');

        	/*Inicializando selects*/
	        	$("#period_ejerc_id").select2({
				  	placeholder: "Selecciona el ejercicio ...",
				  	allowClear: true
				});



	    	/*$.mask.definitions['~']='[+-]';
			$('#cliente_tel_contact').mask('(999) 999-9999');
			$('#cliente_tel_contact_otro').mask('(999) 999-9999');
			$('#cliente_tel').mask('(999) 999-9999');
		
			jQuery.validator.addMethod("cliente_rfc", function (value, element) {
				return this.optional(element) || /^[A-ZÑ&]{3,4}([0-9]{2})([0-1][0-9])([0-3][0-9])[A-Z0-9][A-Z0-9][0-9A]$/.test(value);
			}, "Introduzca un RFC válido.");*/
		
			/*$('#creaperiodo').validate({
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