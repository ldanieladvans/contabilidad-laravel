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
	            <a href="#">Actualizar Cuenta</a>
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
				{{ Form::open(['route' => ['cuentas.update', $cuenta->id], 'class'=>'form-horizontal form-label-left', 'method'=>'PUT', 'id'=>'editacuenta']) }}
                	{{ Form::hidden('_method', 'PUT') }}

					<input type="hidden" name="ctacont_catsat_nom" id="ctacont_catsat_nom" value="{{$cuenta->ctacont_catsat_nom}}">
					<input type="hidden" name="ctacont_tipocta_nom" id="ctacont_tipocta_nom" value="{{$cuenta->ctacont_tipocta_nom}}">

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="ctacont_num">Número de cuenta:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="ctacont_num" id="ctacont_num" class="col-md-10 col-sm-10 col-xs-12" value="{{$cuenta->ctacont_num}}"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="ctacont_catsat_cod">Código cuenta SAT:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="ctacont_catsat_cod" name="ctacont_catsat_cod" data-placeholder="Seleccione la cuenta SAT..." style="width: 83%; display: none;">
								@foreach($ctacont_catsat_cod as $tp)
	                            	<option value="{{ $tp->id }}" {{$cuenta->ctacont_catsat_cod == $tp->id ? 'selected':''}}>{{ $tp->id }}</option>
	                            @endforeach
							</select>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="ctacont_tipocta_cod">Código tipo cuenta SAT:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="ctacont_tipocta_cod" name="ctacont_tipocta_cod" data-placeholder="Seleccione el tipo de cuenta SAT..." style="width: 83%; display: none;">
								@foreach($ctacont_tipocta_cod as $tp)
	                            	<option value="{{ $tp->id }}" {{$cuenta->ctacont_tipocta_cod == $tp->id ? 'selected':''}}>{{ $tp->id }}</option>
	                            @endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="ctacont_tiposubcta_id">Tipo Subcuenta:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="ctacont_tiposubcta_id" name="ctacont_tiposubcta_id" data-placeholder="Seleccione el tipo de subcuenta ..." style="width: 83%; display: none;">
								@foreach($ctacont_tiposubcta_id as $tp)
	                            	<option value="{{ $tp->id }}" {{$cuenta->ctacont_tiposubcta_id == $tp->id ? 'selected':''}}>{{ $tp->tiposubcta_nom }}</option>
	                            @endforeach
							</select>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="ctacont_natur">Naturaleza:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="ctacont_natur" name="ctacont_natur" data-placeholder="Seleccione la naturaleza de la cuenta ..." style="width: 83%; display: none;">
									<option value="">Seleccione ...</option>
	                            	<option value="credit" {{$cuenta->ctacont_natur == 'credit' ? 'selected':''}}>Acreedora</option>
	                            	<option value="debit" {{$cuenta->ctacont_natur == 'debit' ? 'selected':''}}>Deudora</option>
							</select>
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
											Descripción
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#messages">
											<i class="green ace-icon fa fa-bank bigger-120"></i>
											Detalles
										</a>
									</li>
								</ul>



								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										<div class="form-group">
											<div class="col-md-12 col-sm-12 col-xs-12">
												<div class="clearfix">
													<input type="text" placeholder="Descripción" name="ctacont_desc" id="ctacont_desc" class="col-md-12 col-sm-12 col-xs-12" value="{{$cuenta->ctacont_desc}}"/>
												</div>
											</div>
										</div>
									</div>

									<div id="messages" class="tab-pane fade">
										<div class="form-group">
											<label class="control-label col-md-1 col-sm-1 col-xs-12" for="ctacont_tiposubcta_id">Fecha SAT:</label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="clearfix">
													<input class="form-control date-picker" id="ctacont_f_iniciosat" name="ctacont_f_iniciosat" type="date" data-date-format="yyyy-mm-dd" value="{{$cuenta->ctacont_f_iniciosat}}" />
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="ctacont_efectivo">Cuenta de efectivo ?: </label>
											    <div class="col-md-2 col-sm-2 col-xs-12">
											    	<label>
														<input name="ctacont_efectivo" id="ctacont_efectivo" class="ace ace-switch" type="checkbox" {{$cuenta->ctacont_efectivo ? 'checked':''}}/>
														<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
													</label>
												</div>

											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="ctacont_decalarada">Cuenta declarada ?: </label>
										    <div class="col-md-2 col-sm-2 col-xs-12">
										    	<label>
													<input name="ctacont_decalarada" id="ctacont_decalarada" class="ace ace-switch" type="checkbox" {{$cuenta->ctacont_decalarada ? 'checked':''}}/>
													<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
												</label>
											</div>

											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="ctacont_pte_complnt">Cuenta interna ?: </label>

										    <div class="col-md-2 col-sm-2 col-xs-12">
										    	<label>
													<input name="ctacont_pte_complnt" id="ctacont_pte_complnt" class="ace ace-switch" type="checkbox" {{$cuenta->ctacont_pte_complnt ? 'checked':''}}/>
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
	                            <button id="cancel" type="button" onclick="location.href = '/cuentas';" class="btn btn-info">Cancelar</button>
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
	        	$("#menucuentas").addClass('active');
	        	$("#menucontabilidad").addClass('open');
	        	$("#menucontabilidadconfig").addClass('open');

        	/*Inicializando selects*/
	        	$("#ctacont_catsat_cod").select2({
				  	placeholder: "Selecciona la cuenta SAT ...",
				  	allowClear: true
				});

				$("#ctacont_tipocta_cod").select2({
				  	placeholder: "Selecciona el tipo de cuenta SAT ...",
				  	allowClear: true
				});

				$("#ctacont_tiposubcta_id").select2({
				  	placeholder: "Selecciona el tipo de subcuenta ...",
				  	allowClear: true
				});

				$("#ctacont_natur").select2({
				  	placeholder: "Selecciona la naturaleza de la cuenta ...",
				  	allowClear: true
				});



	    	/*$.mask.definitions['~']='[+-]';
			$('#cliente_tel_contact').mask('(999) 999-9999');
			$('#cliente_tel_contact_otro').mask('(999) 999-9999');
			$('#cliente_tel').mask('(999) 999-9999');
		
			jQuery.validator.addMethod("cliente_rfc", function (value, element) {
				return this.optional(element) || /^[A-ZÑ&]{3,4}([0-9]{2})([0-1][0-9])([0-3][0-9])[A-Z0-9][A-Z0-9][0-9A]$/.test(value);
			}, "Introduzca un RFC válido.");*/
		
			$('#creacuenta').validate({
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
			});

		</script>

@endsection