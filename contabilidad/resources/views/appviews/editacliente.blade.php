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
	            <a href="#">Crear Cliente</a>
	        </li>
	    </ul>
	</div>
@endsection

@section('page_header_content')
	<div class="page-header">
	    @if (Session::has('message'))
            <div class="alert alert-success alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
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
				<form class="form-horizontal" action="{{ route('clientes.store') }}" method='POST'>
					{{ csrf_field() }}
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="cliente_nom">Nombre:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="cliente_nom" id="cliente_nom" class="col-md-10 col-sm-10 col-xs-12"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="cliente_rfc">RFC:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="cliente_rfc" id="cliente_rfc" class="col-md-10 col-sm-10 col-xs-12"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="cliente_email">Correo:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="email" name="cliente_email" id="cliente_email" class="col-md-12 col-sm-9 col-xs-12"/>
							</div>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="cliente_tipocliente_id">Tipo:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="text" name="cliente_tipocliente_id" id="cliente_tipocliente_id" class="col-md-10 col-sm-10 col-xs-12"/>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-12 col-sm-12 col-xs-12">



							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active">
										<a data-toggle="tab" href="#home">
											<i class="green ace-icon fa fa-home bigger-120"></i>
											Dirección
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#messages">
											Messages
											<span class="badge badge-danger">4</span>
										</a>
									</li>
								</ul>



								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										<div>
											<label>Nuevo Domicilio ?: </label>
											<div>
											    <div>
											    	<label>
														<input name="nueva_dir" id="nueva_dir" class="ace ace-switch" type="checkbox" onchange="toggleCheckbox(this)"/>
														<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
													</label>
												</div>
											</div>
										</div>
										<div id="contenedor_selecc_dir">
											<label for="cliente_direc_id">Domicilio</label>

											<br />
											<select class="js-example-basic-single js-states form-control" id="cliente_direc_id" name="cliente_direc_id" data-placeholder="Seleccione una dirección ...">
												@foreach($domicilios as $domicile)
					                            	<option value="{{ $domicile->id }}">{{ $domicile->direc_num_ext }} - {{ $domicile->direc_cp }} - {{ $domicile->direc_estado }} - {{ $domicile->direc_colonia }} - {{ $domicile->direc_municipio }} - {{ $domicile->direc_pais }}</option>
					                            @endforeach
											</select>
										</div>
										
										<div id="contenedor_nueva_dir" hidden>
											<div class="form-group">
												<label class="control-label col-xs-12 col-sm-1 col-md-1" for="cliente_rfc">RFC:</label>
												<div class="col-md-2 col-sm-2 col-xs-12">
						                        	<input id="dom_search_cp"  name="dom_search_cp" placeholder="Buscar C.P." type="text" title="Buscar Código Postal">
						                        </div>
						                        <label class="control-label col-xs-12 col-sm-2 col-md-2" for="dom_estado_aux">Estado/Municipio:</label>
												<div>
						                        	<select class="js-example-basic-single js-states form-control" name="dom_estado_aux" id="dom_estado_aux" style="width: 28%; display: none;">
							                            <option value="">Seleccione ...</option>
							                            <option value="AGU">Aguascalientes</option>
							                            <option value="BCN">Baja California</option>
							                            <option value="BCS">Baja California Sur</option>
							                            <option value="CAM">Campeche</option>
							                            <option value="CHP">Chiapas</option>
							                            <option value="CHH">Chihuahua</option>
							                            <option value="CMX">Ciudad de México</option>
							                            <option value="COA">Coahuila de Zaragoza</option>
							                            <option value="COL">Colima</option>
							                            <option value="DUR">Durango</option>
							                            <option value="GUA">Guanajuato</option>
							                            <option value="GRO">Guerrero</option>
							                            <option value="HID">Hidalgo</option>
							                            <option value="JAL">Jalisco</option>
							                            <option value="MEX">México</option>
							                            <option value="MIC">Michoacan de Ocampo</option>
							                            <option value="MOR">Morelos</option>
							                            <option value="NAY">Nayarit</option>
							                            <option value="NLE">Nuevo León</option>
							                            <option value="OAX">Oaxaca</option>
							                            <option value="PUE">Puebla</option>
							                            <option value="QUE">Querétaro de Arteaga</option>
							                            <option value="ROO">Quintana Roo</option>
							                            <option value="SLP">San Luis Potosí</option>
							                            <option value="SIN">Sinaloa</option>
							                            <option value="SON">Sonora</option>
							                            <option value="TAB">Tabasco</option>
							                            <option value="TAM">Tamaulipas</option>
							                            <option value="TLA">Tlaxcala</option>
							                            <option value="VER">Veracruz de Ignacio de la Llave</option>
							                            <option value="YUC">Yucatán</option>
							                            <option value="ZAC">Zacatecas</option> 
							                        </select>

							                        <select class="js-example-basic-single js-states form-control" name="dom_munic" id="dom_munic" style="width: 28%; display: none;">
							                            <option value="">Seleccione ...</option>
							                        </select>
						                        </div>
						                    </div>
										    <div id="tabla_nueva_dir" class="form-group">
												<table id="dynamic-table" class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th class="center" style="display:none;">
																<label class="pos-rel">
																	<input type="checkbox" class="ace" />
																	<span class="lbl"></span>
																</label>
															</th>
															<th>Domain</th>
															<th>Price</th>
															<th class="hidden-480">Clicks</th>

															<th>
																<i class="ace-icon fa fa-clock-o bigger-110 hidden-480"></i>
																Update
															</th>
															<th class="hidden-480">Status</th>

															<th style="display:none;"></th>
														</tr>
													</thead>

													<tbody>
														<tr>
															<td class="center" style="display:none;">
																<label class="pos-rel">
																	<input type="checkbox" class="ace" />
																	<span class="lbl"></span>
																</label>
															</td>
															<td>
																<a href="#">app.com</a>
															</td>
															<td>$45</td>
															<td class="hidden-480">3,330</td>
															<td>Feb 12</td>

															<td class="hidden-480">
																<span class="label label-sm label-warning">Expiring</span>
															</td>

															<td style="display:none;">

															</td>
														</tr>
														<tr>
															<td class="center" style="display:none;">
																<label class="pos-rel">
																	<input type="checkbox" class="ace" />
																	<span class="lbl"></span>
																</label>
															</td>
															<td>
																<a href="#">app.com</a>
															</td>
															<td>$45</td>
															<td class="hidden-480">3,330</td>
															<td>Feb 12</td>

															<td class="hidden-480">
																<span class="label label-sm label-warning">Expiring</span>
															</td>

															<td style="display:none;">
																
															</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div id="campos_nueva_dir" class="form-group"></div>
										</div>
									</div>

									<div id="messages" class="tab-pane fade">
										<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
									</div>

								</div>
							</div>
						</div>
					</div>

				</form>

			</div>
	</div>
@endsection

@section('app_js')
        @parent
        <script src="{{ asset('ac_theme/assets/js/wizard.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.validate.min.js') }}"></script>

		<script src="{{ asset('ac_theme/assets/js/jquery.maskedinput.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/select2.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/bootstrap-tag.min.js') }}"></script>
		<!-- tables -->
		<script src="{{ asset('ac_theme/assets/js/jquery.dataTables.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.dataTables.bootstrap.min.js') }}"></script>

		<script src="{{ asset('ac_theme/assets/js/dataTables.select.min.js') }}"></script>
		<!-- ace scripts -->
		<script src="{{ asset('ac_theme/assets/js/ace-elements.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/ace.min.js') }}"></script>

		<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>

		<script type="text/javascript">

			/* Marcando el menú seleccionado */
	        	$.each(document.getElementById("menus").getElementsByTagName("li"), function( index, value ) {
				  value.classList.remove("active");
				});
	        	$("#menucliente").addClass('active');
	        	$("#menudirectorio").addClass('open');

        	/*Inicializando selects*/
	        	$("#cliente_direc_id").select2({
				  	placeholder: "Selecciona el domicilio",
				  	allowClear: true
				});

				$("#dom_estado_aux").select2({
				  	placeholder: "Selecciona el estado",
				  	allowClear: true
				});

				$("#dom_munic").select2({
				  	placeholder: "Selecciona el municipio",
				  	allowClear: true
				});
			
			/*Inicializando dataTable*/
				var myTable = 
				$('#dynamic-table')
				.DataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
					
					select: {
						style: 'single'
					},
					language: {
				        processing:     "Procesando ...",
				        search:         "Buscar:",
				        lengthMenu:    "Mostrar _MENU_ elementos",
				        info:           "Mostrando _START_ a _END_ de _TOTAL_ elementos",
				        infoEmpty:      "No existen elementos para mostrar",
				        infoFiltered:   "(filtrado de _MAX_ elementos del total)",
				        infoPostFix:    "",
				        loadingRecords: "Cargando ...",
				        zeroRecords:    "Sin datos",
				        emptyTable:     "No existen elementos para mostrar 2",
				        paginate: {
				            first:      "Primer",
				            previous:   "Anterior",
				            next:       "Siguiente",
				            last:       "Último"
				        },
				        aria: {
				            sortAscending:  ": ordenado ascendente",
				            sortDescending: ": ordenado descendente"
				        }
				    }
			    } );

				
				myTable.on( 'select', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', true);
						console.log(myTable.row( index ).data());

						$(".select-info").hide();
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						$( myTable.row( index ).node() ).find('input:checkbox').prop('checked', false);
					}
				} );
			

		/*Funcion para cambio en direccion*/
			function toggleCheckbox(element){
				if(element.checked){
					$("#contenedor_nueva_dir").show();
	   				$("#contenedor_selecc_dir").hide();
				}else{
					$("#contenedor_selecc_dir").show();
	   				$("#contenedor_nueva_dir").hide();
				}
			}
		</script>

@endsection