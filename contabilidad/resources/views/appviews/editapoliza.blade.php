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
	            <a href="#">Actualizar Póliza</a>
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
				{{ Form::open(['route' => ['polizas.update', $poliza->id], 'class'=>'form-horizontal form-label-left', 'method'=>'PUT', 'id'=>'editapoliza']) }}
                	{{ Form::hidden('_method', 'PUT') }}


					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="polz_concepto">Concepto:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="polz_concepto" id="polz_concepto" class="col-md-10 col-sm-10 col-xs-12" value="{{$poliza->polz_concepto}}"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="polz_folio">Folio:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="polz_folio" id="polz_folio" class="col-md-12 col-sm-12 col-xs-12" value="{{$poliza->polz_folio}}"/>
							</div>
						</div>

						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pago_fecha">Fecha:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="date" name="polz_fecha" id="polz_fecha" class="col-md-10 col-sm-10 col-xs-12" value="{{$poliza->polz_fecha}}"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="polz_importe">Importe:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="number" name="polz_importe" id="polz_importe" class="col-md-10 col-sm-10 col-xs-12" value="{{$poliza->polz_importe}}"/>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="polz_tipopolz">Tipo:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="polz_tipopolz" name="polz_tipopolz" data-placeholder="Seleccione el tipo de póliza ..." style="width: 83%; display: none;">
                            	<option value="ingreso" {{$poliza->polz_tipopolz == 'ingreso' ? 'selected':''}}>Ingreso</option>
                            	<option value="egreso" {{$poliza->polz_tipopolz == 'egreso' ? 'selected':''}}>Egreso</option>
                            	<option value="diario" {{$poliza->polz_tipopolz == 'diario' ? 'selected':''}}>Diario</option>
                            	<option value="orden" {{$poliza->polz_tipopolz == 'orden' ? 'selected':''}}>Orden</option>
                            	<option value="estadistica" {{$poliza->polz_tipopolz == 'estadistica' ? 'selected':''}}>Estadística</option>
							</select>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="polz_period_id">Período:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="polz_period_id" name="polz_period_id" data-placeholder="Seleccione el período ..." style="width: 83%; display: none;">
									@foreach($polz_period_id as $tp)
		                            	<option value="{{ $tp->id }}" {{$poliza->polz_period_id == $tp->id ? 'selected':''}}>{{ $tp->id }}</option>
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
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="polz_aprobado">Aprobada ?: </label>
											    <div class="col-md-2 col-sm-2 col-xs-12">
											    	<label>
														<input name="polz_aprobado" id="polz_aprobado" class="ace ace-switch" type="checkbox" {{$poliza->polz_aprobado ? 'checked':''}}/>
														<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
													</label>
												</div>

											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="polz_importada">Es importada ?: </label>
										    <div class="col-md-2 col-sm-2 col-xs-12">
										    	<label>
													<input name="polz_importada" id="polz_importada" class="ace ace-switch" type="checkbox" {{$poliza->polz_importada ? 'checked':''}}/>
													<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
												</label>
											</div>

											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="polz_activo">Activa ?: </label>

										    <div class="col-md-2 col-sm-2 col-xs-12">
										    	<label>
													<input name="polz_activo" id="polz_activo" class="ace ace-switch" type="checkbox" {{$poliza->polz_activo ? 'checked':''}}/>
													<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
												</label>
											</div>

										</div>

										<div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="polz_cierre">Es de cierre ?: </label>
											    <div class="col-md-2 col-sm-2 col-xs-12">
											    	<label>
														<input name="polz_cierre" id="polz_cierre" class="ace ace-switch" type="checkbox" {{$poliza->polz_cierre ? 'checked':''}}/>
														<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
													</label>
												</div>

											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="polz_modificada">Es modificada ?: </label>
										    <div class="col-md-2 col-sm-2 col-xs-12">
										    	<label>
													<input name="polz_modificada" id="polz_modificada" class="ace ace-switch" type="checkbox" {{$poliza->polz_modificada ? 'checked':''}}/>
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
	                            <button id="cancel" type="button" onclick="location.href = '/polizas';" class="btn btn-info">Cancelar</button>
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
	        	$("#menupoliza").addClass('active');
	        	$("#menucontabilidad").addClass('open');

        	/*Inicializando selects*/
	        	$("#polz_tipopolz").select2({
				  	placeholder: "Seleccione el tipo de póliza ...",
				  	allowClear: true
				});

				$("#polz_period_id").select2({
				  	placeholder: "Seleccione el período ...",
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


		$('#pago_formpago_cod').change(function(){
            document.getElementById('pago_formpago_nom').value = this.options[this.selectedIndex].text;            
        });

        $('#pago_moneda_cod').change(function(){
            document.getElementById('pago_moneda_nom').value = this.options[this.selectedIndex].text;            
        });

		</script>

@endsection