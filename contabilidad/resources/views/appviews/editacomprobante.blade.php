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
	<!--<link rel="stylesheet" type="text/css" href="{{ asset('DevExtreme/Sources/Lib/css/dx.spa.css') }}" />-->
    <link rel="stylesheet" type="text/css" href="{{ asset('DevExtreme/Sources/Lib/css/dx.common.css') }}" />
    <link rel="dx-theme" data-theme="generic.light" href="{{ asset('DevExtreme/Sources/Lib/css/dx.light.css') }}" />
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	    <ul class="breadcrumb">
	        <li>
	            <i class="ace-icon fa fa-group home-icon"></i>
	            <a href="#">Actualizar Comprobante</a>
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
				{{ Form::open(['route' => ['comprobantes.update', $comprobante->id], 'class'=>'form-horizontal form-label-left', 'method'=>'PUT', 'id'=>'editacomprobante']) }}
                	{{ Form::hidden('_method', 'PUT') }}

                	<input type="hidden" value="{{$compsrel}}" id="compsrel"/>
                	<input type="hidden" value="{{$comprobante}}" id="comprobante"/>
                	<input type="hidden" value="{{$provis}}" id="provis"/>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="comp_uuid">UUID:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="comp_uuid" id="comp_uuid" class="col-md-10 col-sm-10 col-xs-12" value="{{$comprobante->comp_uuid}}"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="comp_rfc_emisor">RFC Emisor:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="comp_rfc_emisor" id="comp_rfc_emisor" class="col-md-12 col-sm-12 col-xs-12" value="{{$comprobante->comp_rfc_emisor}}"/>
							</div>
						</div>

						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="comp_rfc_receptor">RFC Receptor:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="comp_rfc_receptor" id="comp_rfc_receptor" class="col-md-10 col-sm-10 col-xs-12"  value="{{$comprobante->comp_rfc_receptor}}"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="comp_f_emision">Fecha Emisión:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="date" name="comp_f_emision" id="comp_f_emision" class="col-md-10 col-sm-10 col-xs-12"  value="{{$comprobante->comp_f_emision}}"/>
							</div>
						</div>
					</div>


					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="comp_tipocomp">Tipo de Complemento:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="comp_tipocomp" name="comp_tipocomp" data-placeholder="Seleccione el tipo de complemento ..." style="width: 83%; display: none;">
                            	<option value="ingreso" {{$comprobante->comp_tipocomp == 'ingreso' ? 'selected':''}}>Ingreso</option>
                            	<option value="egreso" {{$comprobante->comp_tipocomp == 'egreso' ? 'selected':''}}>Egreso</option>
                            	<option value="pago" {{$comprobante->comp_tipocomp == 'pago' ? 'selected':''}}>Pago</option>
                            	<option value="nomina" {{$comprobante->comp_tipocomp == 'nomina' ? 'selected':''}}>Nómina</option>
							</select>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="comp_complmto">Complemento:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="comp_complmto" name="comp_complmto" data-placeholder="Seleccione el período ..." style="width: 83%; display: none;">
                            	<option value="CompNac" {{$comprobante->comp_tipocomp == 'CompNac' ? 'selected':''}}>Complemento Nacional</option>
                            	<option value="CompNalOt" {{$comprobante->comp_tipocomp == 'CompNalOt' ? 'selected':''}}>Complemento Nacional Otro</option>
                            	<option value="CompExt" {{$comprobante->comp_tipocomp == 'CompExt' ? 'selected':''}}>Complemento Extra</option>
                            	<option value="Cheque" {{$comprobante->comp_tipocomp == 'Cheque' ? 'selected':''}}>Cheque</option>
                            	<option value="Transferencia" {{$comprobante->comp_tipocomp == 'Transferencia' ? 'selected':''}}>Transferencia</option>
                            	<option value="OtrMetodoPago" {{$comprobante->comp_tipocomp == 'OtrMetodoPago' ? 'selected':''}}>Otro Metodo de Pago</option>
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
											Otros Datos
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#checks">
											<i class="green ace-icon fa fa-bank bigger-120"></i>
											Comprobantes Relacionados
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#provs">
											<i class="green ace-icon fa fa-bank bigger-120"></i>
											Provisiones
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#pols">
											<i class="green ace-icon fa fa-bank bigger-120"></i>
											Pólizas
										</a>
									</li>
								</ul>



								<div class="tab-content">

									<div id="home" class="tab-pane fade in active">

										<div class="form-group">
											<label class="control-label col-xs-12 col-sm-1 col-md-1" for="comp_cbb_serie">Serie:</label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="clearfix">
													<input type="text" name="comp_cbb_serie" id="comp_cbb_serie" class="col-md-12 col-sm-12 col-xs-12" value="{{$comprobante->comp_cbb_serie}}"/>
												</div>
											</div>

											<label class="control-label col-xs-12 col-sm-1 col-md-1" for="comp_cbb_numfolio">No. Folio:</label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="clearfix">
													<input type="text" name="comp_cbb_numfolio" id="comp_cbb_numfolio" class="col-md-10 col-sm-10 col-xs-12" value="{{$comprobante->comp_cbb_numfolio}}"/>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-xs-12 col-sm-1 col-md-1" for="comp_num_factelect">No. Factura Elactrónica:</label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="clearfix">
													<input type="text" name="comp_num_factelect" id="comp_num_factelect" class="col-md-12 col-sm-12 col-xs-12" value="{{$comprobante->comp_num_factelect}}"/>
												</div>
											</div>

											<label class="control-label col-xs-12 col-sm-1 col-md-1" for="comp_taxid">Impuesto:</label>
											<div class="col-md-4 col-sm-4 col-xs-12">
												<div class="clearfix">
													<input type="text" name="comp_taxid" id="comp_taxid" class="col-md-10 col-sm-10 col-xs-12" value="{{$comprobante->comp_taxid}}"/>
												</div>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="comp_espago">Es de Pago ?: </label>
											    <div class="col-md-2 col-sm-2 col-xs-12">
											    	<label>
														<input name="comp_espago" id="comp_espago" class="ace ace-switch" type="checkbox" {{$comprobante->comp_espago ? 'checked':''}}/>
														<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
													</label>
												</div>

											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="comp_imp_bov">Es importada ?: </label>
										    <div class="col-md-2 col-sm-2 col-xs-12">
										    	<label>
													<input name="comp_imp_bov" id="comp_imp_bov" class="ace ace-switch" type="checkbox" {{$comprobante->comp_imp_bov ? 'checked':''}}/>
													<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
												</label>
											</div>

										</div>
										
									</div>

									<div id="checks" class="tab-pane fade">

										<div class="form-group">
											<div id="gridContainer"></div>
										</div>
										
									</div>

									<div id="provs" class="tab-pane fade">

										<div class="form-group">
											<div id="gridContainerProvis"></div>
										</div>
										
									</div>

									<div id="pols" class="tab-pane fade">
										<div class="form-group">
											<label for="opolizas">Pólizas: </label>
											<select multiple="multiple" class="js-example-basic-multiple" id="opolizas" name="opolizas[]" data-placeholder="Seleccione ..." style="width: 83%; display: none;" disabled>
												@foreach($polizas as $pls)
													<option value="{{$pls->id}}" {{$comprobante->tienePoliza($pls->id) ? 'selected':''}}>{{$pls->polz_folio}}</option>
												@endforeach
											</select>
										</div>
										<div class="form-group">
											<label for="polizas">Agregar Pólizas: </label>
											<select multiple="multiple" class="js-example-basic-multiple" id="polizas" name="polizas[]" data-placeholder="Seleccione ..." style="width: 83%; display: none;">
												@foreach($polizas as $pls)
													@if(!$comprobante->tienePoliza($pls->id))
														<option value="{{$pls->id}}">{{$pls->polz_folio}}</option>
													@endif
												@endforeach
											</select>
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
	                            <button id="cancel" type="button" onclick="location.href = '/comprobantes';" class="btn btn-info">Cancelar</button>
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


		<script src="{{ asset('DevExtreme/Sources/Lib/js/dx.all.js') }}"></script>
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
	        	$("#menucomprobante").addClass('active');
	        	$("#menucontabilidad").addClass('open');

        	/*Inicializando selects*/
	        	$("#comp_tipocomp").select2({
				  	placeholder: "Seleccione el tipo de complemento ...",
				  	allowClear: true
				});

				$("#comp_complmto").select2({
				  	placeholder: "Seleccione el complemento ...",
				  	allowClear: true
				});

				$("#polizas").select2({
				  	placeholder: "Seleccione las pólizas ...",
				  	allowClear: true,
				  	multiple: true
				});

				$("#opolizas").select2({
				  	placeholder: "Pólizas ...",
				  	multiple: true
				});


			var compsrel = jQuery.parseJSON(document.getElementById('compsrel').value);
			var comprobante = jQuery.parseJSON(document.getElementById('comprobante').value);
			var provis = jQuery.parseJSON(document.getElementById('provis').value);

			console.log(comprobante.id);

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


		/*Tabla Producto SAT*/
			$("#gridContainer").dxDataGrid({
		        dataSource: compsrel,
		        paging: {
		            enabled: false
		        },
		        editing: {
		            mode: "row",
		            allowUpdating: true,
		            allowDeleting: true,
		            allowAdding: true,
		            texts:{
		            	addRow: 'Nueva',
		            	cancelRowChanges: 'Cancelar',
		            	deleteRow: 'Borrar',
		            	editRow: 'Editar',
		            	saveRowChanges: 'Guardar',
		            	confirmDeleteMessage: '¿Está seguro que quiere eliminar este registro?'
		            },
		        }, 
		        columns: [
		            {
		                dataField: "comprel_tiporel_nom",
		                caption: "Nombre",
		                validationRules: [{
		                    type: "required"
		                }]
		            },{
		                dataField: "comprel_tiporel_cod",
		                caption: "Código",
		                validationRules: [{
		                    type: "required"
		                }]
		            },{
		                dataField: "comprel_comp_rel_uuid",
		                caption: "UUID",
		                validationRules: [{
		                    type: "required"
		                }]
		            }   
		        ],
		        onEditingStart: function(e) {
		            console.log("EditingStart");
		        },
		        onInitNewRow: function(e) {
		            console.log("InitNewRow");
		        },
		        onRowInserting: function(e) {
		            console.log("RowInserting");
		        },
		        onRowInserted: function(e) {
		            console.log("RowInserted");

		            $('#loadingmodal').modal('show');
		            $.ajax({
		                url: '/comprel',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN, comprel_comp_id:comprobante.id, comprel_tiporel_cod:e.data.comprel_tiporel_cod, comprel_tiporel_nom:e.data.comprel_tiporel_nom, comprel_comp_rel_uuid:e.data.comprel_comp_rel_uuid, crudmethod:'create',row_id:'false'},
		                dataType: 'JSON',
		                success: function (data) {
		            	    $('#loadingmodal').modal('hide');
		            	    var thisgrid = $("#gridContainer").dxDataGrid('instance');
		            	    e.key.ID = data.data_id;
		            	    thisgrid.refresh();
		                },
		                error: function(XMLHttpRequest, textStatus, errorThrown) { 
		                    console.log(errorThrown);
		                }
		            });

		            console.log(e);
		        },
		        onRowUpdating: function(e) {
		            console.log("RowUpdating");
		        },
		        onRowUpdated: function(e) {
		            console.log("RowUpdated");
		            console.log(e);
		            $('#loadingmodal').modal('show');
		            $.ajax({
		                url: '/comprel',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN, comprel_comp_id:comprobante.id, comprel_tiporel_cod:e.key.comprel_tiporel_cod, comprel_tiporel_nom:e.key.comprel_tiporel_nom, comprel_comp_rel_uuid:e.key.comprel_comp_rel_uuid, crudmethod:'edit',row_id:e.key.ID},
		                dataType: 'JSON',
		                success: function (data) {
		            	    $('#loadingmodal').modal('hide');
		            	    var thisgrid = $("#gridContainer").dxDataGrid('instance');
		            	    e.key.ID = data.data_id;
		            	    thisgrid.refresh();
		                },
		                error: function(XMLHttpRequest, textStatus, errorThrown) { 
		                    console.log(errorThrown);
		                }
		            });
		        },
		        onRowRemoving: function(e) {
		            console.log("RowRemoving");
		            $('#loadingmodal').modal('show');
		            $.ajax({
		                url: '/comprel',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN, comprel_comp_id:comprobante.id, comprel_tiporel_cod:e.key.comprel_tiporel_cod, comprel_tiporel_nom:e.key.comprel_tiporel_nom, comprel_comp_rel_uuid:e.key.comprel_comp_rel_uuid, crudmethod:'delete',row_id:e.key.ID},
		                dataType: 'JSON',
		                success: function (data) {
		            	    $('#loadingmodal').modal('hide');
		            	    var thisgrid = $("#gridContainer").dxDataGrid('instance');
		            	    thisgrid.refresh();
		                },
		                error: function(XMLHttpRequest, textStatus, errorThrown) { 
		                    console.log(errorThrown);
		                }
		            });
		        },
		        onRowRemoved: function(e) {
		            console.log("RowRemoved");
		        }
		    });


			$("#gridContainerProvis").dxDataGrid({
		        dataSource: provis,
		        paging: {
		            enabled: false
		        },
		        editing: {
		            mode: "row",
		            allowUpdating: true,
		            allowDeleting: true,
		            allowAdding: true,
		            texts:{
		            	addRow: 'Nueva',
		            	cancelRowChanges: 'Cancelar',
		            	deleteRow: 'Borrar',
		            	editRow: 'Editar',
		            	saveRowChanges: 'Guardar',
		            	confirmDeleteMessage: '¿Está seguro que quiere eliminar este registro?'
		            },
		        }, 
		        columns: [
		            {
		                dataField: "provis_metpago_cod",
		                caption: "Método de Pago",
		                validationRules: [{
		                    type: "required"
		                }]
		            },{
		                dataField: "provis_formpago_cod",
		                caption: "Forma de Pago",
		                validationRules: [{
		                    type: "required"
		                }]
		            },{
		                dataField: "provis_moneda_nom",
		                caption: "Moneda",
		                validationRules: [{
		                    type: "required"
		                }]
		            },{
		                dataField: "provis_moneda_cod",
		                caption: "Código de Moneda",
		                validationRules: [{
		                    type: "required"
		                }]
		            },{
		                dataField: "provis_tipo_cambio",
		                caption: "Tipo de Cambio",
		                dataType: "number",
		                validationRules: [{
		                    type: "required"
		                }]
		            },{
		                dataField: "provis_monto",
		                caption: "Monto",
		                dataType: "number",
		                validationRules: [{
		                    type: "required"
		                }]
		            }    
		        ],
		        onEditingStart: function(e) {
		            console.log("EditingStart");
		        },
		        onInitNewRow: function(e) {
		            console.log("InitNewRow");
		        },
		        onRowInserting: function(e) {
		            console.log("RowInserting");
		        },
		        onRowInserted: function(e) {
		            console.log("RowInserted");

		            $('#loadingmodal').modal('show');
		            $.ajax({
		                url: '/provis',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN, provis_comp_id:comprobante.id, provis_metpago_cod:e.data.provis_metpago_cod, provis_formpago_cod:e.data.provis_formpago_cod, provis_moneda_nom:e.data.provis_moneda_nom, provis_moneda_cod:e.data.provis_moneda_cod, provis_tipo_cambio:e.data.provis_tipo_cambio, provis_monto:e.data.provis_monto, crudmethod:'create',row_id:'false'},
		                dataType: 'JSON',
		                success: function (data) {
		            	    $('#loadingmodal').modal('hide');
		            	    var thisgrid = $("#gridContainerProvis").dxDataGrid('instance');
		            	    e.key.ID = data.data_id;
		            	    thisgrid.refresh();
		                },
		                error: function(XMLHttpRequest, textStatus, errorThrown) { 
		                    console.log(errorThrown);
		                }
		            });

		            console.log(e);
		        },
		        onRowUpdating: function(e) {
		            console.log("RowUpdating");
		        },
		        onRowUpdated: function(e) {
		            console.log("RowUpdated");
		            console.log(e);
		            $('#loadingmodal').modal('show');
		            $.ajax({
		                url: '/provis',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN, provis_comp_id:comprobante.id, provis_metpago_cod:e.key.provis_metpago_cod, provis_formpago_cod:e.key.provis_formpago_cod, provis_moneda_nom:e.key.provis_moneda_nom, provis_moneda_cod:e.key.provis_moneda_cod, provis_tipo_cambio:e.key.provis_tipo_cambio, provis_monto:e.key.provis_monto, crudmethod:'edit',row_id:e.key.ID},
		                dataType: 'JSON',
		                success: function (data) {
		            	    $('#loadingmodal').modal('hide');
		            	    var thisgrid = $("#gridContainerProvis").dxDataGrid('instance');
		            	    e.key.ID = data.data_id;
		            	    thisgrid.refresh();
		                },
		                error: function(XMLHttpRequest, textStatus, errorThrown) { 
		                    console.log(errorThrown);
		                }
		            });
		        },
		        onRowRemoving: function(e) {
		            console.log("RowRemoving");
		            $('#loadingmodal').modal('show');
		            $.ajax({
		                url: '/provis',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN, provis_comp_id:comprobante.id, provis_metpago_cod:e.key.provis_metpago_cod, provis_formpago_cod:e.key.provis_formpago_cod, provis_moneda_nom:e.key.provis_moneda_nom, provis_moneda_cod:e.key.provis_moneda_cod, provis_tipo_cambio:e.key.provis_tipo_cambio, provis_monto:e.key.provis_monto, crudmethod:'delete',row_id:e.key.ID},
		                dataType: 'JSON',
		                success: function (data) {
		            	    $('#loadingmodal').modal('hide');
		            	    var thisgrid = $("#gridContainerProvis").dxDataGrid('instance');
		            	    thisgrid.refresh();
		                },
		                error: function(XMLHttpRequest, textStatus, errorThrown) { 
		                    console.log(errorThrown);
		                }
		            });
		        },
		        onRowRemoved: function(e) {
		            console.log("RowRemoved");
		        }
		    });



		</script>

@endsection