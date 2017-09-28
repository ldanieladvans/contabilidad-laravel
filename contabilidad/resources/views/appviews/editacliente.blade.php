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
				<form class="form-horizontal" action="{{ route('clientes.store') }}" method='POST' id="creacliente">
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
							<select class="js-example-basic-single js-states form-control" id="cliente_tipocliente_id" name="cliente_tipocliente_id" data-placeholder="Seleccione el tipo de cliente ..." style="width: 83%; display: none;">
								@foreach($tipocliente as $tp)
	                            	<option value="{{ $tp->id }}">{{ $tp->tipocliente_desc }}</option>
	                            @endforeach
							</select>
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
											<i class="green ace-icon fa fa-bank bigger-120"></i>
											Contabilidad
										</a>
									</li>

									<li>
										<a data-toggle="tab" href="#contacts">
											<i class="green ace-icon fa fa-group bigger-120"></i>
											Contactos
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
												<label class="control-label col-xs-12 col-sm-1 col-md-1" for="cliente_rfc">CP:</label>
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
															<th>
																
															</th>
															<th>Código Postal</th>
															<th>Estado</th>
															<th>Ciudad</th>
															<th>Asentamiento</th>
															<th>Tipo Asentamiento</th>
														</tr>
													</thead>
												</table>
											</div>
											<div id="campos_nueva_dir" class="form-group">
												<div class="form-group">
					                            	<!--<div >
								                        <div >
								                          	<select class="js-example-basic-single js-states form-control" name="dom_country" id="dom_country">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($countries as $country)
									                            	<option value="{{ $country->c_char_code }}" {{ $country->c_char_code == 'MEX' ? 'selected' : '' }}>{{ $country->c_name_es }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
							                        </div>	-->	

							                        <div class="col-md-4 col-sm-4 col-xs-12">
								                    	<input id="dom_cp" class="form-control has-feedback-left" name="dom_cp" placeholder="Código Postal" type="text">
								                    </div>					   

								                    <div class="col-md-4 col-sm-4 col-xs-12">
								                        <input id="dom_estado" class="form-control has-feedback-left" name="dom_estado" placeholder="Estado" type="text">
								                    </div>

								                    <div class="col-md-4 col-sm-4 col-xs-12">
								                        <input id="dom_ciudad" class="form-control has-feedback-left" name="dom_ciudad" placeholder="Ciudad" type="text">
								                    </div>							                    
							                    </div>

							                    <div class="item form-group">
							                    	

								                    <div class="col-md-6 col-sm-6 col-xs-12">
								                        <input id="dom_col" class="form-control has-feedback-left" name="dom_col" placeholder="Asentamiento" type="text">
								                    </div>

								                  	<div class="col-md-6 col-sm-6 col-xs-12">
								                    	<input id="dom_calle" class="form-control has-feedback-left" name="dom_calle" placeholder="Calle" type="text">
								                    </div>
							                    </div>

						                  		<div class="item form-group">
							                  	  	<div class="col-md-6 col-sm-6 col-xs-12">
								                        <input id="dom_numext" class="form-control has-feedback-left" name="dom_numext" placeholder="# Ext" type="text">
								                    </div>

								                    <div class="col-md-6 col-sm-6 col-xs-12">
								                        <input id="dom_numint" class="form-control has-feedback-left" name="dom_numint" placeholder="# Int" type="text">
								                    </div>					                  
							                    </div>
											</div>
										</div>
									</div>

									<div id="messages" class="tab-pane fade">
										<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
									</div>

									<div id="contacts" class="tab-pane fade">
										<p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid.</p>
									</div>

								</div>
							</div>
						</div>
					</div>

					<div class="ln_solid"></div>
                        <div class="form-group">
	                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
	                            <button id="cancel" type="button" onclick="location.href = '/clientes';" class="btn btn-info">Cancelar</button>
	                            <button type="reset" class="btn btn-primary">Borrar Datos</button>
	                  		    <button id="send" type="submit" class="btn btn-success">Guardar</button>
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
		<script src="{{ asset('ac_theme/assets/js/jquery-additional-methods.min.js') }}"></script>
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
	        	$("#menucliente").addClass('active');
	        	$("#menudirectorio").addClass('open');

        	/*Inicializando selects*/
	        	$("#cliente_direc_id").select2({
				  	placeholder: "Selecciona el domicilio",
				  	allowClear: true
				});

				$("#cliente_tipocliente_id").select2({
				  	placeholder: "Selecciona el tipo de cliente",
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

				$("#dom_country").select2({
				  	placeholder: "Selecciona el municipio",
				  	allowClear: true
				});
			
			/*Inicializando dataTable*/



				var myTable = 
				$('#dynamic-table')
				.DataTable( {
					//data: jQuery.parseJSON(document.getElementById('cpmex').value),
					bAutoWidth: false,
					"aoColumns": [
					  null, null, null,null, null, null
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
						var rowdata = dt.data();
						document.getElementById('dom_cp').value = rowdata[1];
						document.getElementById('dom_col').value = rowdata[4];
						if(rowdata[2]!=''){
							document.getElementById('dom_ciudad').value = rowdata[3];
						}else{
							document.getElementById('dom_ciudad').value = $('#dom_munic option:selected').text();
						}
						document.getElementById('dom_estado').value = rowdata[2];
					}
				} );
				myTable.on( 'deselect', function ( e, dt, type, index ) {
					if ( type === 'row' ) {
						document.getElementById('dom_cp').value = '';
						document.getElementById('dom_col').value = '';
						document.getElementById('dom_ciudad').value = '';
						document.getElementById('dom_estado').value = '';
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

		/* Funcion que busca códigos postales */
			$("#dom_search_cp").on('blur', function(){
				if(this.value!=''){
					$('#loadingmodal').modal('show');
		    		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		    		$.ajax({
		                url: '/getcpdata',
	                	type: 'POST',
	                	data: {_token: CSRF_TOKEN,dommunicserv:dom_munic_serv,domestadoserv:dom_estado_serv,cp:document.getElementById("dom_search_cp").value},
		                dataType: 'JSON',
		                success: function (data) {
		                	
	                	    $('#loadingmodal').modal('hide');

		                    var dataTablevalues = [];
		                    var table_counter = 0;

		                    data['tabledata'].forEach(function(item){
		                        dataTablevalues.push(['<label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label>',item.d_codigo,item.d_estado,item.d_ciudad,item.d_asenta,item.d_tipo_asenta]);
		                        table_counter ++;
		                    });

		                    $('#dynamic-table').dataTable().fnDestroy();
		                    dtobj = $('#dynamic-table').DataTable( {
					        	data: dataTablevalues,
					        	bAutoWidth: false,
								"aoColumns": [
									  null, null, null,null, null, null
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
					        });
		                },
		                error: function(XMLHttpRequest, textStatus, errorThrown) { 
		                    console.log(errorThrown);
		                }
		            });
		    	}
	    	});


	    	$("#dom_estado_aux").on('change', function(){
				var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
				dom_estado_serv = this.value;

				$("#dom_munic").val(null).trigger("change");

	    		$("#dom_munic option").each(function() {
					$(this).remove();
				});

				$('#dom_munic').append($('<option>', {
				    value: '',
				    text: 'Seleccione ...'
				}));

	    		if(this.value!=''){
	    		  	$('#loadingmodal').modal('show');
		            $.ajax({
		                url: '/getcpdata',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN,domestadoserv:this.value,cp:document.getElementById("dom_search_cp").value,dommunicserv:dom_munic_serv},
		                dataType: 'JSON',
		                success: function (data) {
	                	    $('#loadingmodal').modal('hide');
		                  
		                    data['munics'].forEach(function(item){
			                  	$('#dom_munic').append($('<option>', {
								    value: item.m_code,
								    text: item.m_description
								}));
		                    });

		                    var dataTablevalues = [];
		                    var table_counter = 0;

		                    data['tabledata'].forEach(function(item){
		                        dataTablevalues.push(['<label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label>',item.d_codigo,item.d_estado,item.d_ciudad,item.d_asenta,item.d_tipo_asenta]);
		                        table_counter ++;
		                    });

		                    $('#dynamic-table').dataTable().fnDestroy();
			                    dtobj = $('#dynamic-table').DataTable( {
						        	data: dataTablevalues,
						        	bAutoWidth: false,
									"aoColumns": [
									  null, null, null,null, null, null
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
						        });
		                },
		                error: function(XMLHttpRequest, textStatus, errorThrown) { 
		                    console.log(errorThrown);
		                }
		            });
	    		}       
	    	});


	    	$("#dom_munic").on('change', function(){
	    		var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
	    		var table = document.getElementById('dynamic-table');
		        var rowCount = table.rows.length;

		        while(table.rows.length > 1){
		        	table.deleteRow(1);
		        }

	    		dom_munic_serv = this.value;
	    		dom_munic_text = this.text;

	    		if(this.value!=''){
	    		  	$('#loadingmodal').modal('show');
		            $.ajax({
		                url: '/getcpdata',
		                type: 'POST',
		                data: {_token: CSRF_TOKEN,dommunicserv:dom_munic_serv,domcpserv:dom_cp_serv,domestadoserv:dom_estado_serv,cp:document.getElementById("dom_search_cp").value},
		                dataType: 'JSON',
		                success: function (data) {
	                	    $('#loadingmodal').modal('hide');

		                    var dataTablevalues = [];
		                    var table_counter = 0;

		                    data['tabledata'].forEach(function(item){
		                        dataTablevalues.push(['<label class="pos-rel"><input type="checkbox" class="ace" /><span class="lbl"></span></label>',item.d_codigo,item.d_estado,item.d_ciudad,item.d_asenta,item.d_tipo_asenta]);
		                        table_counter ++;
		                    });

		                    $('#dynamic-table').dataTable().fnDestroy();
			                    dtobj = $('#dynamic-table').DataTable( {
						        	data: dataTablevalues,
						        	bAutoWidth: false,
									"aoColumns": [
									  null, null, null,null, null, null
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
						        });
		                },
		                error: function(XMLHttpRequest, textStatus, errorThrown) { 
		                    console.log(errorThrown);
		                }
		            });
	    		}    
	    	});


	    	$.mask.definitions['~']='[+-]';
			$('#phone').mask('(999) 999-9999');
		
			jQuery.validator.addMethod("phone", function (value, element) {
				return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
			}, "Enter a valid phone number.");
		
			$('#creacliente').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				ignore: "",
				rules: {
					cliente_nom: {
						required: true
					},
					email: {
						required: true,
						email:true
					},
					password: {
						required: true,
						minlength: 5
					},
					password2: {
						required: true,
						minlength: 5,
						equalTo: "#password"
					},
					name: {
						required: true
					},
					phone: {
						required: true,
						phone: 'required'
					},
					url: {
						required: true,
						url: true
					},
					comment: {
						required: true
					},
					state: {
						required: true
					},
					platform: {
						required: true
					},
					subscription: {
						required: true
					},
					gender: {
						required: true,
					},
					agree: {
						required: true,
					}
				},
		
				messages: {
					email: {
						required: "Please provide a valid email.",
						email: "Please provide a valid email."
					},
					password: {
						required: "Please specify a password.",
						minlength: "Please specify a secure password."
					},
					state: "Please choose state",
					subscription: "Please choose at least one option",
					gender: "Please choose gender",
					agree: "Please accept our policy"
				},
		
		
				highlight: function (e) {
					$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
				},
		
				success: function (e) {
					$(e).closest('.form-group').removeClass('has-error');//.addClass('has-info');
					$(e).remove();
				},
		
				errorPlacement: function (error, element) {
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
				},
				invalidHandler: function (form) {
				}
			});

		</script>

@endsection