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

                	<input type="hidden" value="{{$asientos}}" id="asientos"/>
                	<input type="hidden" value="{{$poliza}}" id="poliza"/>
                	<input type="hidden" value="{{$cuentas}}" id="cuentas"/>

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
		                            	<option value="{{ $tp->id }}" {{$poliza->polz_period_id == $tp->id ? 'selected':''}}>{{ $tp->period_fecha_ini }} - {{ $tp->period_fecha_fin }}</option>
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
											Asientos
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#comprobantes">
											<i class="green ace-icon fa fa-bank bigger-120"></i>
											Comprobantes
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#checks">
											<i class="green ace-icon fa fa-bank bigger-120"></i>
											Chequeos
										</a>
									</li>
								</ul>



								<div class="tab-content">
									
									<div id="home" class="tab-pane fade in active">
										<div class="form-group">
											<div id="gridContainerAsientos"></div>
										</div>
									</div>


									<div id="comprobantes" class="tab-pane fade">
										<div class="form-group">
											<label for="opolizas">Comprobantes: </label>
											<select multiple="multiple" class="js-example-basic-multiple" id="comps" name="comps[]" data-placeholder="Seleccione ..." style="width: 83%; display: none;" {{$poliza->polz_manual ? '':'disabled'}}>
												@foreach($comprobantes as $pls)
													<option value="{{$pls->id}}" {{$poliza->tieneComprobante($pls->id) ? 'selected':''}}>{{$pls->comp_uuid}}</option>
												@endforeach
											</select>
										</div>
										<!--<div class="form-group" {{$poliza->polz_manual ? '':'hidden'}}>
											<label for="comps">Agregar Comprobante: </label>
											<select multiple="multiple" class="js-example-basic-multiple" id="comps" name="comps[]" data-placeholder="Seleccione ..." style="width: 83%; display: none;">
												@foreach($comprobantes as $pls)
													@if(!$poliza->tieneComprobante($pls->id))
														<option value="{{$pls->id}}">{{$pls->comp_uuid}}</option>
													@endif
												@endforeach
											</select>
										</div>-->
									</div>


									<div id="checks" class="tab-pane fade">

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

				$("#comps").select2({
				  	placeholder: "Seleccione los comprobantes ...",
				  	allowClear: true,
				  	multiple: true
				});

				/*$("#ocomps").select2({
				  	placeholder: "Comprobantes ...",
				  	multiple: true
				});*/


			var asientos = jQuery.parseJSON(document.getElementById('asientos').value);
			var poliza = jQuery.parseJSON(document.getElementById('poliza').value);
			var cuentas = jQuery.parseJSON(document.getElementById('cuentas').value);

	    	$("#gridContainerAsientos").dxDataGrid({
		        dataSource: asientos,
		        paging: {
		            enabled: false
		        },
		        editing: {
		            mode: "row",
		            allowUpdating: poliza.polz_manual,
		            allowDeleting: poliza.polz_manual,
		            allowAdding: poliza.polz_manual,
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
		                dataField: "asiento_concepto",
		                caption: "Concepto",
		                validationRules: [{
		                    type: "required"
		                }]
		            },{
		                dataField: "asiento_folio_ref",
		                caption: "Folio",
		                validationRules: [{
		                    type: "required"
		                }]
		            },{
		                dataField: "asiento_debe",
		                caption: "Debe",
		                validationRules: [{ type: "required" }, { type: "numeric" }]
		            },{
		                dataField: "asiento_haber",
		                caption: "Haber",
		                validationRules: [{ type: "required" }, { type: "numeric" }]
		            },{
		                dataField: "asiento_ctacont_id",
		                caption: "Cuenta",
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
		            //TODO
		            $.ajax({
		                url: '/pasientos',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN, asiento_polz_id:poliza.id, crudmethod:'create',row_id:'false',asiento_concepto:e.data.asiento_concepto,asiento_folio_ref:e.data.asiento_folio_ref,asiento_debe:e.data.asiento_debe,asiento_haber:e.data.asiento_haber,asiento_ctacont_id:e.data.asiento_ctacont_id,asiento_polz_id:poliza.id},
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
		            //TODO
		            $.ajax({
		                url: '/pasientos',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN, asiento_polz_id:poliza.id, crudmethod:'edit',row_id:e.key.ID,asiento_concepto:e.key.asiento_concepto,asiento_folio_ref:e.key.asiento_folio_ref,asiento_debe:e.key.asiento_debe,asiento_haber:e.key.asiento_haber,asiento_ctacont_id:e.key.asiento_ctacont_id,asiento_polz_id:poliza.id},
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
		            //TODO
		            $.ajax({
		                url: '/pasientos',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN, asiento_polz_id:poliza.id, crudmethod:'delete',row_id:e.key.ID,asiento_concepto:e.key.asiento_concepto,asiento_folio_ref:e.key.asiento_folio_ref,asiento_debe:e.key.asiento_debe,asiento_haber:e.key.asiento_haber,asiento_ctacont_id:e.key.asiento_ctacont_id,asiento_polz_id:poliza.id},
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


		$('#pago_formpago_cod').change(function(){
            document.getElementById('pago_formpago_nom').value = this.options[this.selectedIndex].text;            
        });

        $('#pago_moneda_cod').change(function(){
            document.getElementById('pago_moneda_nom').value = this.options[this.selectedIndex].text;            
        });

		</script>

@endsection