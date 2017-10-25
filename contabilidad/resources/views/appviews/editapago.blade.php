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
	            <a href="#">Actualizar Pago</a>
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
				{{ Form::open(['route' => ['pagos.update', $pago->id], 'class'=>'form-horizontal form-label-left', 'method'=>'PUT', 'id'=>'editapago']) }}
                	{{ Form::hidden('_method', 'PUT') }}

					<input type="hidden" name="pago_formpago_nom" id="pago_formpago_nom" value="">
					<input type="hidden" name="pago_moneda_nom" id="pago_moneda_nom" value="">

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pago_numoperc">No. operación:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="pago_numoperc" id="pago_numoperc" class="col-md-10 col-sm-10 col-xs-12" value="{{$pago->pago_numoperc}}"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pago_monto">Monto:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="number" name="pago_monto" id="pago_monto" class="col-md-12 col-sm-12 col-xs-12" value="{{$pago->pago_monto}}"/>
							</div>
						</div>

						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pago_fecha">Fecha:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="date" name="pago_fecha" id="pago_fecha" class="col-md-10 col-sm-10 col-xs-12" value="{{$pago->pago_fecha}}"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pago_tipo_cambio">Pago tipo de cambio:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="number" name="pago_tipo_cambio" id="pago_tipo_cambio" class="col-md-10 col-sm-10 col-xs-12" value="{{$pago->pago_tipo_cambio}}"/>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pago_nombanc_ordext">Banco:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="pago_nombanc_ordext" id="pago_nombanc_ordext" class="col-md-12 col-sm-12 col-xs-12" value="{{$pago->pago_nombanc_ordext}}"/>
							</div>
						</div>

						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pago_sello_pago">Sello:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="pago_sello_pago" id="pago_sello_pago" class="col-md-10 col-sm-10 col-xs-12" value="{{$pago->pago_sello_pago}}"/>
							</div>
						</div>
						
					</div>


					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pago_rfcemisor_ctaord">Cta. Ordenante Emisor:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="pago_rfcemisor_ctaord" id="pago_rfcemisor_ctaord" class="col-md-12 col-sm-12 col-xs-12" value="{{$pago->pago_rfcemisor_ctaord}}"/>
							</div>
						</div>

						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pago_rfcrecept_ctaben">Cta. Ordenante Receptor:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="pago_rfcrecept_ctaben" id="pago_rfcrecept_ctaben" class="col-md-10 col-sm-10 col-xs-12" value="{{$pago->pago_rfcrecept_ctaben}}"/>
							</div>
						</div>

						
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pago_cta_ben">Cuenta Beneficiario:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="pago_cta_ben" id="pago_cta_ben" class="col-md-12 col-sm-12 col-xs-12" value="{{$pago->pago_cta_ben}}"/>
							</div>
						</div>

						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="pago_cta_ordnte">Cuenta Ordenante:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="pago_cta_ordnte" id="pago_cta_ordnte" class="col-md-10 col-sm-10 col-xs-12" value="{{$pago->pago_cta_ordnte}}"/>
							</div>
						</div>
					</div>



					

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="pago_formpago_cod">Forma de pago SAT:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="pago_formpago_cod" name="pago_formpago_cod" data-placeholder="Seleccione la forma de pago SAT ..." style="width: 83%; display: none;">
								@foreach($pago_formpago_cod as $tp)
	                            	<option value="{{ $tp->formpago_formpagosat_cod }}" {{$pago->formpago_formpagosat_cod == $tp->formpago_formpagosat_cod ? 'selected':''}}>{{ $tp->formpago_formpagosat_nom }}</option>
	                            @endforeach
							</select>
						</div>

						



						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="pago_moneda_cod">Moneda:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="pago_moneda_cod" name="pago_moneda_cod" data-placeholder="Seleccione la moneda ..." style="width: 83%; display: none;">
									@foreach($pago_moneda_cod as $mn)
		                            	<option value="{{ trim($mn->cat_sat_monedas_codigo) }}" {{trim($pago->pago_moneda_cod) == trim($mn->cat_sat_monedas_codigo) ? 'selected':''}}>{{ $mn->cat_sat_monedas_nombre }}</option>
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
											Contabilidad
										</a>
									</li>
								</ul>



								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										<div class="form-group">
											<label class="control-label col-md-1 col-sm-1 col-xs-12" for="pago_polz_id">Póliza:</label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<select class="js-example-basic-single js-states form-control" id="pago_polz_id" name="pago_polz_id" data-placeholder="Seleccione la póliza ..." style="width: 83%; display: none;">
													@foreach($pago_polz_id as $tp)
						                            	<option value="{{ $tp->id }}" {{$pago->pago_polz_id == $tp->id ? 'selected':''}}>{{ $tp->polz_folio }}</option>
						                            @endforeach
												</select>
											</div>

											<label class="control-label col-md-1 col-sm-1 col-xs-12" for="pago_comp_id">Comprobante:</label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<select class="js-example-basic-single js-states form-control" id="pago_comp_id" name="pago_comp_id" data-placeholder="Seleccione el comprobante ..." style="width: 83%; display: none;">
													@foreach($pago_comp_id as $tp)
						                            	<option value="{{ $tp->id }}" {{$pago->pago_comp_id == $tp->id ? 'selected':''}}>{{ $tp->comp_uuid }}</option>
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
	                            <button id="cancel" type="button" onclick="location.href = '/pagos';" class="btn btn-info">Cancelar</button>
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
	        	$("#menupago").addClass('active');
	        	$("#menucontabilidad").addClass('open');

        	/*Inicializando selects*/
	        	$("#pago_formpago_cod").select2({
				  	placeholder: "Selecciona la forma de pago SAT ...",
				  	allowClear: true
				});

				$("#pago_moneda_cod").select2({
				  	placeholder: "Selecciona la moneda ...",
				  	allowClear: true
				});

				$("#pago_polz_id").select2({
				  	placeholder: "Selecciona la póliza ...",
				  	allowClear: true
				});

				$("#pago_comp_id").select2({
				  	placeholder: "Selecciona el comprobante ...",
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