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
	            <a href="#">Crear Configuración de Nómina</a>
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
				{{ Form::open(['route' => ['contconfig.update', $confnom->id], 'class'=>'form-horizontal form-label-left', 'method'=>'PUT', 'id'=>'editacontconfig']) }}
                	{{ Form::hidden('_method', 'PUT') }}

					<input type="hidden" name="confconcs" id="confconcs" value="{{$confconcs}}">
					<input type="hidden" name="cuentas" id="cuentas" value="{{$cuentas}}">
					<input type="hidden" name="tconcs" id="tconcs" value="{{$tconcs}}">

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="confnom_contabiliz_nom">Contabilización:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<select class="js-example-basic-single js-states form-control" id="confnom_contabiliz_nom" name="confnom_contabiliz_nom" data-placeholder="Seleccione la cuenta SAT..." style="width: 83%; display: none;" onchange="toggleSelect(this)">
	                            	<option value="amount" {{$confnom->confnom_contabiliz_nom == 'amount' ? 'selected':''}}>Por monto</option>
	                            	<option value="concept" {{$confnom->confnom_contabiliz_nom == 'concept' ? 'selected':''}}>Por concepto</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="confnom_prov_nom_cta_id">Cuenta de Provisión:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="confnom_prov_nom_cta_id" name="confnom_prov_nom_cta_id" data-placeholder="Seleccione la cuenta SAT..." style="width: 83%; display: none;">
								@foreach($confnom_prov_nom_cta_id as $tp)
	                            	<option value="{{ $tp->id }}" {{$confnom->confnom_prov_nom_cta_id == $tp->id ? 'selected':''}}>{{ $tp->ctacont_num }}</option>
	                            @endforeach
							</select>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="confnom_percep_cta_id">Cuenta de percepción:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="confnom_percep_cta_id" name="confnom_percep_cta_id" data-placeholder="Seleccione el tipo de cuenta SAT..." style="width: 83%; display: none;">
								@foreach($confnom_percep_cta_id as $tp)
	                            	<option value="{{ $tp->id }}" {{$confnom->confnom_percep_cta_id == $tp->id ? 'selected':''}}>{{ $tp->ctacont_num }}</option>
	                            @endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="confnom_retenc_cta_id">Cuenta de retención:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="confnom_retenc_cta_id" name="confnom_retenc_cta_id" data-placeholder="Seleccione el tipo de subcuenta ..." style="width: 83%; display: none;">
								@foreach($confnom_retenc_cta_id as $tp)
	                            	<option value="{{ $tp->id }}" {{$confnom->confnom_retenc_cta_id == $tp->id ? 'selected':''}}>{{ $tp->ctacont_num }}</option>
	                            @endforeach
							</select>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="confnom_otrospag_cta_id">Cuenta otros:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="confnom_otrospag_cta_id" name="confnom_otrospag_cta_id" data-placeholder="Seleccione la naturaleza de la cuenta ..." style="width: 83%; display: none;">
								@foreach($confnom_otrospag_cta_id as $tp)
	                            	<option value="{{ $tp->id }}" {{$confnom->confnom_otrospag_cta_id == $tp->id ? 'selected':''}}>{{ $tp->ctacont_num }}</option>
	                            @endforeach
							</select>
						</div>
					</div>

					<div class="form-group">
						
					</div>

					<div id="contenedor_div" class="form-group" {{$confnom->confnom_contabiliz_nom == 'amount' ? 'hidden':''}}>
						<div class="col-md-12 col-sm-12 col-xs-12">



							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active">
										<a data-toggle="tab" href="#home">
											<i class="green ace-icon fa fa-home bigger-120"></i>
											Conceptos
										</a>
									</li>

								</ul>



								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										


									<div class="form-group">
										<div id="gridContainer"></div>
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
	                            <button id="cancel" type="button" onclick="location.href = '/contconfig';" class="btn btn-info">Cancelar</button>
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
	        	$("#menucuentas").addClass('active');
	        	$("#menucontabilidad").addClass('open');
	        	$("#menucontabilidadconfig").addClass('open');

        	/*Inicializando selects*/
        		$("#confnom_contabiliz_nom").select2({
				  	placeholder: "Selecciona el tipo de contabilización",
				  	allowClear: true
				});

	        	$("#confnom_prov_nom_cta_id").select2({
				  	placeholder: "Selecciona la cuenta de provisión ...",
				  	allowClear: true
				});

				$("#confnom_percep_cta_id").select2({
				  	placeholder: "Selecciona la cuenta de percepción ...",
				  	allowClear: true
				});

				$("#confnom_retenc_cta_id").select2({
				  	placeholder: "Selecciona la cuenta de retención ...",
				  	allowClear: true
				});

				$("#confnom_otrospag_cta_id").select2({
				  	placeholder: "Selecciona la cuenta para otros conceptos ...",
				  	allowClear: true
				});


			function toggleSelect(element){
				if(element.value == 'concept'){
					$("#contenedor_div").show();
				}else{
	   				$("#contenedor_div").hide();
				}
			}

	    	/*$.mask.definitions['~']='[+-]';
			$('#cliente_tel_contact').mask('(999) 999-9999');
			$('#cliente_tel_contact_otro').mask('(999) 999-9999');
			$('#cliente_tel').mask('(999) 999-9999');
		
			jQuery.validator.addMethod("cliente_rfc", function (value, element) {
				return this.optional(element) || /^[A-ZÑ&]{3,4}([0-9]{2})([0-1][0-9])([0-3][0-9])[A-Z0-9][A-Z0-9][0-9A]$/.test(value);
			}, "Introduzca un RFC válido.");*/
		
			$('#creacontconfig').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				ignore: "",
				rules: {
					confnom_contabiliz_nom: {
						required: true
					},
					confnom_prov_nom_cta_id: {
						required: true
					},
					confnom_percep_cta_id: {
						required: true
					},
					confnom_retenc_cta_id: {
						required: true
					},
					confnom_otrospag_cta_id: {
						required: true
					}
				},
		
				messages: {
					confnom_contabiliz_nom: {
						required: "Este campo es requerido."
					},
					confnom_prov_nom_cta_id: {
						required: "Este campo es requerido."
					},
					confnom_percep_cta_id: {
						required: "Este campo es requerido."
					},
					confnom_retenc_cta_id: {
						required: "Este campo es requerido."
					},
					confnom_otrospag_cta_id: {
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



        var confconcs = jQuery.parseJSON(document.getElementById('confconcs').value);
		var cuentas = jQuery.parseJSON(document.getElementById('cuentas').value);
		var tconcs = jQuery.parseJSON(document.getElementById('tconcs').value);

        $("#gridContainer").dxDataGrid({
		        dataSource: confconcs,
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
		                dataField: "confconc_codsat",
		                caption: "Código SAT",
		                validationRules: [{
		                    type: "required"
		                }]
		            }, {
		                dataField: "confconc_tipoconcpto",
		                caption: "Tipo Concepto",
		                lookup: {
		                    dataSource: tconcs,
		                    displayExpr: "Name",
		                    valueExpr: "ID"
		                },
		                validationRules: [{
		                    type: "required"
		                }]
		            },{
		                dataField: "confconc_cta_id",
		                caption: "Cuenta Concepto",
		                lookup: {
		                    dataSource: cuentas,
		                    displayExpr: "Name",
		                    valueExpr: "ID"
		                },
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
		                url: '/confconc',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN,confconc_codsat:e.data.confconc_codsat,confconc_tipoconcpto:e.data.confconc_tipoconcpto,confconc_cta_id:e.data.confconc_cta_id,crudmethod:'create',row_id:'false'},
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
		                url: '/confconc',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN,confconc_codsat:e.key.confconc_codsat,confconc_tipoconcpto:e.key.confconc_tipoconcpto,confconc_cta_id:e.key.confconc_cta_id,crudmethod:'edit',row_id:e.key.ID},
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
		                url: '/confconc',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN,confconc_codsat:e.key.confconc_codsat,confconc_tipoconcpto:e.key.confconc_tipoconcpto,confconc_cta_id:e.key.confconc_cta_id,crudmethod:'delete',row_id:e.key.ID},
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

		</script>

@endsection