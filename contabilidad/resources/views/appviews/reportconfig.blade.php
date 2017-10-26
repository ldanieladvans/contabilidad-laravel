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
            <strong>TODO</strong>
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
			                    <div class="dd" >
											<ol class="dd-list">
												<li class="dd-item" data-id="1">
													<div class="dd-handle">
														Item 1
														<i class="pull-right bigger-130 ace-icon fa fa-exclamation-triangle orange2"></i>
													</div>
												</li>

												<li class="dd-item" data-id="2">
													<div class="dd-handle">Item 2</div>

													<ol class="dd-list">
														<li class="dd-item" data-id="3">
															<div class="dd-handle">
																Item 3
																<a data-rel="tooltip" data-placement="left" title="Change Date" href="#" class="pull-right tooltip-info btn btn-primary btn-mini btn-white btn-bold">
																	<i class="bigger-120 ace-icon fa fa-calendar"></i>
																</a>
															</div>
														</li>

														<li class="dd-item" data-id="4">
															<div class="dd-handle">
																<span class="orange">Item 4</span>
																<span class="lighter grey">
																	&nbsp; with some description
																</span>
															</div>
														</li>

														<li class="dd-item" data-id="5">
															<div class="dd-handle">
																Item 5
																<div class="pull-right action-buttons">
																	<a class="blue" href="#">
																		<i class="ace-icon fa fa-pencil bigger-130"></i>
																	</a>

																	<a class="red" href="#">
																		<i class="ace-icon fa fa-trash-o bigger-130"></i>
																	</a>
																</div>
															</div>

															<ol class="dd-list">
																<li class="dd-item item-orange" data-id="6">
																	<div class="dd-handle"> Item 6 </div>
																</li>

																<li class="dd-item item-red" data-id="7">
																	<div class="dd-handle">Item 7</div>
																</li>

																<li class="dd-item item-blue2" data-id="8">
																	<div class="dd-handle">Item 8</div>
																</li>
															</ol>
														</li>

														<li class="dd-item" data-id="9">
															<div class="dd-handle btn-yellow no-hover">Item 9</div>
														</li>

														<li class="dd-item" data-id="10">
															<div class="dd-handle">Item 10</div>
														</li>
													</ol>
												</li>

												<li class="dd-item" data-id="11">
													<div class="dd-handle">
														Item 11
														<span class="sticker">
															<span class="label label-success arrowed-in">
																<i class="ace-icon fa fa-check bigger-110"></i>
															</span>
														</span>
													</div>
												</li>

												<li class="dd-item" data-id="12">
													<div class="dd-handle">Item 12</div>
												</li>
											</ol>
										</div>
			                </div>									
						</td>

						<td width="50%" valign="top">
							<h1 style="padding-left: 10px;">Activo</h1>
			                <div id="tscactivo" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle">
									<ol class="dd-list">
										<li class="dd-item dd2-item" data-id="13">
											<div class="dd-handle dd2-handle">
												<i class="normal-icon ace-icon fa fa-comments blue bigger-130"></i>

												<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
											</div>
											<div class="dd2-content">Click on an icon to start dragging</div>
										</li>

										<li class="dd-item dd2-item" data-id="14">
											<div class="dd-handle dd2-handle">
												<i class="normal-icon ace-icon fa fa-clock-o pink bigger-130"></i>

												<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
											</div>
											<div class="dd2-content">Recent Posts</div>
										</li>

										<li class="dd-item dd2-item" data-id="15">
											<div class="dd-handle dd2-handle">
												<i class="normal-icon ace-icon fa fa-signal orange bigger-130"></i>

												<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
											</div>
											<div class="dd2-content">Statistics</div>
										</li>

									</ol>
								</div>
			                </div>
										
							<h1 style="padding-left: 10px;">Pasivo</h1>
			                <div id="tscpasivo" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle">
									<ol class="dd-list">
										<li class="dd-item dd2-item" data-id="13">
											<div class="dd-handle dd2-handle">
												<i class="normal-icon ace-icon fa fa-comments blue bigger-130"></i>

												<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
											</div>
											<div class="dd2-content">Click on an icon to start dragging</div>
										</li>

										<li class="dd-item dd2-item" data-id="14">
											<div class="dd-handle dd2-handle">
												<i class="normal-icon ace-icon fa fa-clock-o pink bigger-130"></i>

												<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
											</div>
											<div class="dd2-content">Recent Posts</div>
										</li>

										<li class="dd-item dd2-item" data-id="15">
											<div class="dd-handle dd2-handle">
												<i class="normal-icon ace-icon fa fa-signal orange bigger-130"></i>

												<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
											</div>
											<div class="dd2-content">Statistics</div>
										</li>

									</ol>
								</div>
			                </div>

			                <h1 style="padding-left: 10px;">Capital</h1>
			                <div id="tsccapital" class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
			                    <div class="dd dd-draghandle">
									<ol class="dd-list">
										<li class="dd-item dd2-item" data-id="13">
											<div class="dd-handle dd2-handle">
												<i class="normal-icon ace-icon fa fa-comments blue bigger-130"></i>

												<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
											</div>
											<div class="dd2-content">Click on an icon to start dragging</div>
										</li>

										<li class="dd-item dd2-item" data-id="14">
											<div class="dd-handle dd2-handle">
												<i class="normal-icon ace-icon fa fa-clock-o pink bigger-130"></i>

												<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
											</div>
											<div class="dd2-content">Recent Posts</div>
										</li>

										<li class="dd-item dd2-item" data-id="15">
											<div class="dd-handle dd2-handle">
												<i class="normal-icon ace-icon fa fa-signal orange bigger-130"></i>

												<i class="drag-icon ace-icon fa fa-arrows bigger-125"></i>
											</div>
											<div class="dd2-content">Statistics</div>
										</li>

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
            <button id="processb" type="button" onclick="processFiles();" class="btn btn-info hidden">Procesar</button>
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
	        	$("#menureportconfig").addClass('active');
	        	$("#menuacciones").addClass('open');

        	jQuery(function($){
			
				$('.dd').nestable();
			
				$('.dd-handle a').on('mousedown', function(e){
					e.stopPropagation();
				});
				
				$('[data-rel="tooltip"]').tooltip();
			
			});

        </script>
@endsection