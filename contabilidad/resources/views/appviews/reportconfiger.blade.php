@extends('templates.layout')

@section('app_css')
	@parent
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('DevExtreme/Sources/Lib/css/dx.spa.css') }}" />-->
    <link rel="stylesheet" href="{{ asset('ac_theme/assets/css/dropzone.min.css') }}" />
    <link href="{{ asset('js/select2/dist/css/select2.css') }}" rel="stylesheet">

    <style type="text/css">
    	#listaContainer {
		  display:flex;
		  justify-content: center;
		  padding: 3px;
		}
		#listaContainer > div {
		  margin:2px;
		}
    </style>
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	    <ul class="breadcrumb">
	        <li>
	            <i class="ace-icon fa fa-group home-icon"></i>
	            <a href="#">Configurar Reportes</a>
	        </li>
	    </ul>
	</div>
@endsection

@section('page_header_content')
	<div class="page-header">
	    
        <div class="alert alert-success alert-dismissible fade in" role="alert">
            <button type="button" id="compalertmsgcta" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
            </button>
            <strong>Está configurando el reporte: <i>ESTADO DE RESULTADOS</i></strong><p> Arrastre las cuentas hacia el grupo que desee y guarde los cambos.</p>
        </div>
        
	</div>
@endsection

@section('variable_content')

	

	<div class="row">

		<div>
			<form action="#" class="dropzone well" id="dropzone">
				{{ csrf_field() }}
				<table width="100%">
					<tr>
						<td width="50%" valign="top">
							<h1>Tipos de Subcuenta</h1>
			                <div class="form-group" id="tscall">
			                    <div class="dd" id="listall">
									<ol class="{{ count($tscuentas_rest_ids) > 0 ? 'dd-list':'dd-empty'}}" id="olall">
										@foreach($tscuentas_rest_ids as $tscr)
											<li class="dd-item" data-id="{{$tscr->id}}">
												<div class="dd-handle">{{$tscr->tiposubcta_nom}}</div>
											</li>
										@endforeach
									</ol>
								</div>
			                </div>									
						</td>

						<td width="50%" valign="top">
							<h1 style="padding-left: 10px;">Ingresos</h1>
			                <div id="tscingreso" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle" id="listingreso">
									<ol class="{{ count($tscuentas_ingreso_ids) > 0 ? 'dd-list':'dd-empty'}}" id="olingreso">
										@foreach($tscuentas_ingreso_ids as $in)
											<li class="dd-item" data-id="{{$in->report_tiposubcta_id}}">
												<div class="dd-handle">{{$in->tipoSubcuenta->tiposubcta_nom}}</div>
											</li>
										@endforeach
								</div>
			                </div>
										
							<h1 style="padding-left: 10px;">Costos de Venta</h1>
			                <div id="tsccostoventa" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle" id="listcostoventa">
									<ol class="{{ count($tscuentas_costoventa_ids) > 0 ? 'dd-list':'dd-empty'}}" id="olcostoventa">
									@foreach($tscuentas_costoventa_ids as $cv)
											<li class="dd-item" data-id="{{$cv->report_tiposubcta_id}}">
												<div class="dd-handle">{{$cv->tipoSubcuenta->tiposubcta_nom}}</div>
											</li>
										@endforeach
									</ol>
								</div>
			                </div>

			                <h1 style="padding-left: 10px;">Gastos</h1>
			                <div id="tscgasto" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle" id="listgasto">
									<ol class="{{ count($tscuentas_gasto_ids) > 0 ? 'dd-list':'dd-empty'}}" id="olgasto">
										@foreach($tscuentas_gasto_ids as $g)
											<li class="dd-item" data-id="{{$g->report_tiposubcta_id}}">
												<div class="dd-handle">{{$g->tipoSubcuenta->tiposubcta_nom}}</div>
											</li>
										@endforeach
									</ol>
								</div>
			                </div>

			                <h1 style="padding-left: 10px;">Otros Ingresos</h1>
			                <div id="tscotroingreso" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle" id="listotroingreso">
									<ol class="{{ count($tscuentas_otroingreso_ids) > 0 ? 'dd-list':'dd-empty'}}" id="olotroingreso">
										@foreach($tscuentas_otroingreso_ids as $oi)
											<li class="dd-item" data-id="{{$oi->report_tiposubcta_id}}">
												<div class="dd-handle">{{$oi->tipoSubcuenta->tiposubcta_nom}}</div>
											</li>
										@endforeach
								</div>
			                </div>
										
							<h1 style="padding-left: 10px;">Otros Gastos</h1>
			                <div id="tscotrogasto" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle" id="listotrogasto">
									<ol class="{{ count($tscuentas_otrogasto_ids) > 0 ? 'dd-list':'dd-empty'}}" id="olotrogasto">
										@foreach($tscuentas_otrogasto_ids as $og)
											<li class="dd-item" data-id="{{$og->report_tiposubcta_id}}">
												<div class="dd-handle">{{$og->tipoSubcuenta->tiposubcta_nom}}</div>
											</li>
										@endforeach
									</ol>
								</div>
			                </div>

			                <h1 style="padding-left: 10px;">Impuestos</h1>
			                <div id="tscimpuesto" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle" id="listimpuesto">
									<ol class="{{ count($tscuentas_impuesto_ids) > 0 ? 'dd-list':'dd-empty'}}" id="olimpuesto">
										@foreach($tscuentas_impuesto_ids as $i)
											<li class="dd-item" data-id="{{$i->report_tiposubcta_id}}">
												<div class="dd-handle">{{$i->tipoSubcuenta->tiposubcta_nom}}</div>
											</li>
										@endforeach
									</ol>
								</div>
			                </div>
						</td>
					</tr>
				</table>


			</form>
		</div>

		
	</div>

	<!--<div class="row">

			<label class="control-label col-md-2 col-sm-2 col-xs-12" for="tipo_comprobante">Tipo de Comprobante:</label>
			<div class="col-md-10 col-sm-10 col-xs-12">
				<select class="js-example-basic-single js-states form-control" id="tipo_comprobante" name="tipo_comprobante" data-placeholder="Seleccione el tipo de comprobante ..." style="width: 100%; display: none;">
	            	<option value="ingreso">Ingreso</option>
	            	<option value="egreso">Egreso</option>
	            	<option value="nomina">Nómina</option>
	            	<option value="pago">Pago</option>
				</select>
			</div>
		
	</div>-->

	<div class="ln_solid"></div>


	</br>
	</br>
    <div class="row">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-5">
            <button id="processb" type="button" onclick="processFiles();" class="btn btn-info">Guardar</button>
        </div>
    </div>
@endsection

@section('app_js')
        @parent

        <script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>

        <script src="{{ asset('ac_theme/assets/js/jquery.nestable.min.js') }}"></script>
        <!-- ace scripts -->
        <script src="{{ asset('ac_theme/assets/js/ace-elements.min.js') }}"></script>
        <script src="{{ asset('ac_theme/assets/js/ace.min.js') }}"></script>
        
        <script type="text/javascript">
        	/* Marcando el menú seleccionado */
	        	$.each(document.getElementById("menus").getElementsByTagName("li"), function( index, value ) {
				  value.classList.remove("active");
				});
	        	$("#menuer").addClass('active');
	        	$("#menuacciones").addClass('open');
	        	$("#menureportconfig").addClass('open');

        	jQuery(function($){
			
				$('.dd').nestable();
			
				$('.dd-handle a').on('mousedown', function(e){
					e.stopPropagation();
				});
				
				$('[data-rel="tooltip"]').tooltip();
			
			});

			function processFiles(){
				var listingreso = [];
				var listcostoventa = [];
				var listgasto = [];
				var listotroingreso = [];
				var listotrogasto = [];
				var listimpuesto = [];
				$('#listingreso li').each(function(i){
				   listingreso.push($(this).attr('data-id'));
				});

				$('#listcostoventa li').each(function(i){
				   listcostoventa.push($(this).attr('data-id'));
				});

				$('#listgasto li').each(function(i){
				   listgasto.push($(this).attr('data-id'));
				});

				$('#listotroingreso li').each(function(i){
				   listotroingreso.push($(this).attr('data-id'));
				});

				$('#listotrogasto li').each(function(i){
				   listotrogasto.push($(this).attr('data-id'));
				});

				$('#listimpuesto li').each(function(i){
				   listimpuesto.push($(this).attr('data-id'));
				});


				$('#loadingmodal').modal('show');
                $.ajax({
                    url: '/setreporter',
                    type: 'POST',
                    data: {_token: CSRF_TOKEN,listingreso:listingreso,listcostoventa:listcostoventa,listgasto:listgasto,listotroingreso:listotroingreso,listotrogasto:listotrogasto,listimpuesto:listimpuesto},
                    dataType: 'JSON',
                    success: function (data) {
                        $('#loadingmodal').modal('hide');
                    }
                });
			}

        </script>
@endsection