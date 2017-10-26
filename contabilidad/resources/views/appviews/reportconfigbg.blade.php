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
            <strong>Está configurando el reporte: <i>BALANCE GENERAL</i></strong><p> Arrastre las cuentas hacia el grupo que desee y guarde los cambos.</p>
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
							<h1 style="padding-left: 10px;">Activo</h1>
			                <div id="tscactivo" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle" id="listactivo">
									<ol class="{{ count($tscuentas_activo_ids) > 0 ? 'dd-list':'dd-empty'}}" id="olactivo">
										@foreach($tscuentas_activo_ids as $tsca)
											<li class="dd-item" data-id="{{$tsca->report_tiposubcta_id}}">
												<div class="dd-handle">{{$tsca->tipoSubcuenta->tiposubcta_nom}}</div>
											</li>
										@endforeach
								</div>
			                </div>
										
							<h1 style="padding-left: 10px;">Pasivo</h1>
			                <div id="tscpasivo" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle" id="listpasivo">
									<ol class="{{ count($tscuentas_pasivo_ids) > 0 ? 'dd-list':'dd-empty'}}" id="olpasivo">
									@foreach($tscuentas_pasivo_ids as $tscp)
											<li class="dd-item" data-id="{{$tscp->report_tiposubcta_id}}">
												<div class="dd-handle">{{$tscp->tipoSubcuenta->tiposubcta_nom}}</div>
											</li>
										@endforeach
									</ol>
								</div>
			                </div>

			                <h1 style="padding-left: 10px;">Capital</h1>
			                <div id="tsccapital" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle" id="listcapital">
									<ol class="{{ count($tscuentas_capital_ids) > 0 ? 'dd-list':'dd-empty'}}" id="olcapital">
										@foreach($tscuentas_capital_ids as $tscc)
											<li class="dd-item" data-id="{{$tscc->report_tiposubcta_id}}">
												<div class="dd-handle">{{$tscc->tipoSubcuenta->tiposubcta_nom}}</div>
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
	        	$("#menubg").addClass('active');
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
				var listactivo = [];
				var listpasivo = [];
				var listcapital = [];
				$('#listactivo li').each(function(i){
				   listactivo.push($(this).attr('data-id'));
				});

				$('#listpasivo li').each(function(i){
				   listpasivo.push($(this).attr('data-id'));
				});

				$('#listcapital li').each(function(i){
				   listcapital.push($(this).attr('data-id'));
				});

				console.log(listactivo);
				console.log(listpasivo);
				console.log(listcapital);

				$('#loadingmodal').modal('show');
                $.ajax({
                    url: '/setreportbg',
                    type: 'POST',
                    data: {_token: CSRF_TOKEN,listactivo:listactivo,listpasivo:listpasivo,listcapital:listcapital},
                    dataType: 'JSON',
                    success: function (data) {
                        $('#loadingmodal').modal('hide');
                    }
                });
			}

        </script>
@endsection