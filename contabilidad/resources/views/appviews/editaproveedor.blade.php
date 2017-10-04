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
	            <a href="#">Actualizar Proveedor</a>
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
				{{ Form::open(['route' => ['proveedores.update', $proveedor->id], 'class'=>'form-horizontal form-label-left', 'method'=>'PUT', 'id'=>'editaproveedor']) }}
                	{{ Form::hidden('_method', 'PUT') }}
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="proveed_nom">Nombre:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="proveed_nom" id="proveed_nom" class="col-md-10 col-sm-10 col-xs-12" value="{{$proveedor->proveed_nom}}" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="proveed_rfc">RFC:</label>
						<div class="col-md-10 col-sm-10 col-xs-12">
							<div class="clearfix">
								<input type="text" name="proveed_rfc" id="proveed_rfc" class="col-md-10 col-sm-10 col-xs-12" value="{{$proveedor->proveed_rfc}}" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="proveed_email">Correo:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="email" name="proveed_email" id="proveed_email" class="col-md-12 col-sm-9 col-xs-12" value="{{$proveedor->proveed_email}}" />
							</div>
						</div>

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="proveed_tel">Teléfono:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<div class="clearfix">
								<input type="tel" name="proveed_tel" id="proveed_tel" class="col-md-10 col-sm-10 col-xs-12" value="{{$proveedor->proveed_tel}}" />
							</div>
						</div>
					</div>

					<div class="form-group">
						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="proveed_tipprov_id">Tipo:</label>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="proveed_tipprov_id" name="proveed_tipprov_id" data-placeholder="Seleccione el tipo de proveedor ..." style="width: 83%; display: none;">
								@foreach($tipoproveedor as $tp)
	                            	<option value="{{ $tp->id }}" {{$proveedor->proveed_tipprov_id == $tp->id ? 'selected':''}}>{{ $tp->tipprov_desc }}</option>
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
											<label for="proveed_direc_id">Domicilio</label>

											<br />
											<select class="js-example-basic-single js-states form-control" id="proveed_direc_id" name="proveed_direc_id" data-placeholder="Seleccione una dirección ...">
												<option value="">Seleccione ...</option>
												@foreach($domicilios as $domicile)
					                            	<option value="{{ $domicile->id }}" {{$proveedor->proveed_direc_id == $domicile->id ? 'selected':''}}>{{ $domicile->direc_num_ext }} - {{ $domicile->direc_cp }} - {{ $domicile->direc_estado }} - {{ $domicile->direc_colonia }} - {{ $domicile->direc_municipio }} - {{ $domicile->direc_pais }}</option>
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
								                        <div>
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
										<table width="100%">
											<tr>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-xs-12 col-sm-2 col-md-2" for="proveed_concepto_polz">Concepto Póliza:</label>
														<div class="col-md-10 col-sm-10 col-xs-12">
															<div class="clearfix">
																<input type="text" name="proveed_concepto_polz" id="proveed_concepto_polz" class="col-md-10 col-sm-10 col-xs-12" value="{{$proveedor->proveed_concepto_polz}}"/>
															</div>
														</div>
													</div>
												</td>
												<td>
													
												</td>
											</tr>
											<tr>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveed_cta_anticp_prov_id">Cuenta de anticipo:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_anticp_prov_id" id="proveed_cta_anticp_prov_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($proveed_cta_anticp_prov_id as $ccac)
								                            	<option value="{{ $ccac->id }}" {{$proveedor->proveed_cta_anticp_prov_id == $ccac->id ? 'selected':''}}>{{ $ccac->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_forma_contab">Forma de contabilización:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="proveed_forma_contab" id="proveed_forma_contab" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($proveed_forma_contab as $cfc)
								                            	<option value="{{ $cfc->id }}" {{$proveedor->proveed_forma_contab == $cfc->id ? 'selected':''}}>{{ $cfc->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
											</tr>
											<tr>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveed_cta_egreso_id">Cuenta de egreso:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_egreso_id" id="proveed_cta_egreso_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($proveed_cta_egreso_id as $cci)
								                            	<option value="{{ $cci->id }}" {{$proveedor->proveed_cta_egreso_id == $cci->id ? 'selected':''}}>{{ $cci->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_cta_desc_id">Cuenta de descuento:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_desc_id" id="proveed_cta_desc_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($proveed_cta_desc_id as $ccd)
								                            	<option value="{{ $ccd->id }}" {{$proveedor->proveed_cta_desc_id == $ccd->id ? 'selected':''}}>{{ $ccd->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
											</tr>
											<tr>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveed_cta_iva_acredit_x_cob_id">Cuenta IVA acreditado por cobrar:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_iva_acredit_x_cob_id" id="proveed_cta_iva_acredit_x_cob_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($proveed_cta_iva_acredit_x_cob_id as $ccitxc)
								                            	<option value="{{ $ccitxc->id }}" {{$proveedor->proveed_cta_iva_acredit_x_cob_id == $ccitxc->id ? 'selected':''}}>{{ $ccitxc->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_cta_iva_acredit_cob_id">Cuenta IVA acreditado cobrado:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_iva_acredit_cob_id" id="proveed_cta_iva_acredit_cob_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($proveed_cta_iva_acredit_cob_id as $ccitc)
								                            	<option value="{{ $ccitc->id }}" {{$proveedor->proveed_cta_iva_acredit_cob_id == $ccitc->id ? 'selected':''}}>{{ $ccitc->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
											</tr>
											<tr>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveed_cta_iva_reten_x_cob_id">Cuenta IVA retenido por cobrar:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_iva_reten_x_cob_id" id="proveed_cta_iva_reten_x_cob_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($proveed_cta_iva_reten_x_cob_id as $ccirxc)
								                            	<option value="{{ $ccirxc->id }}" {{$proveedor->proveed_cta_iva_reten_x_cob_id == $ccirxc->id ? 'selected':''}}>{{ $ccirxc->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_cta_iva_reten_cob_id">Cuenta IVA retenido cobrado:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_iva_reten_cob_id" id="proveed_cta_iva_reten_cob_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($proveed_cta_iva_reten_cob_id as $ccirc)
								                            	<option value="{{ $ccirc->id }}" {{$proveedor->proveed_cta_iva_reten_cob_id == $ccirc->id ? 'selected':''}}>{{ $ccirc->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
											</tr>
											<tr>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveed_cta_isr_reten_id">Cuenta ISR retenido:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_isr_reten_id" id="proveed_cta_isr_reten_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($proveed_cta_isr_reten_id as $ccir)
								                            	<option value="{{ $ccir->id }}" {{$proveedor->proveed_cta_isr_reten_id == $ccir->id ? 'selected':''}}>{{ $ccir->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
												<td width="50%">
													<div class="form-group">
														<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_cta_por_pagar_id">Cuenta por pagar:</label>
							                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_por_pagar_id" id="proveed_cta_por_pagar_id" style="width: 60%; display: none;">
							                            	<option value="">Seleccione ...</option>
							                            	@foreach($proveed_cta_por_pagar_id as $ccpc)
								                            	<option value="{{ $ccpc->id }}" {{$proveedor->proveed_cta_por_pagar_id == $ccpc->id ? 'selected':''}}>{{ $ccpc->id }}</option>
								                            @endforeach
							                          	</select>
							                        </div>
												</td>
											</tr>
										</table>
									</div>

									<div id="contacts" class="tab-pane fade">
										<table width="100%">
											<tr>
												<td width="50%">
													<div class="col-xs-12 col-sm-12 col-md-12">
														<div class="widget-box">
															<div class="widget-header">
																<h4 class="widget-title">Contacto1</h4>
															</div>

															<div class="widget-body">
																<div class="widget-main">
																	<div>
																		<label for="proveed_nom_contct">
																			Nombre
																		</label>

																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="ace-icon fa fa-group"></i>
																			</span>
																			<input class="form-control" type="text" id="proveed_nom_contct" name="proveed_nom_contct" value="{{$proveedor->proveed_nom_contct}}"/>
																		</div>
																	</div>

																	<hr />
																	<div>
																		<label for="proveed_tel_contct">
																			Teléfono
																		</label>

																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="ace-icon fa fa-phone"></i>
																			</span>
																			<input class="form-control" type="tel" id="proveed_tel_contct" name="proveed_tel_contct" value="{{$proveedor->proveed_tel_contct}}"/>
																		</div>
																	</div>

																	<hr />
																	<div>
																		<label for="proveed_email_contct">
																			Correo
																		</label>

																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="ace-icon fa fa-envelope"></i>
																			</span>
																			<input class="form-control" type="tel" id="proveed_email_contct" name="proveed_email_contct" value="{{$proveedor->proveed_email_contct}}"/>
																		</div>
																	</div>

																	<hr />
																</div>
															</div>
														</div>
													</div><!-- /.span -->
												</td>
												<td width="50%">
													<div class="col-xs-12 col-sm-12 col-md-12">
														<div class="widget-box">
															<div class="widget-header">
																<h4 class="widget-title">Contacto2</h4>
															</div>

															<div class="widget-body">
																<div class="widget-main">
																	<div>
																		<label for="proveed_nom_contct_otro">
																			Nombre
																		</label>

																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="ace-icon fa fa-group"></i>
																			</span>
																			<input class="form-control" type="text" id="proveed_nom_contct_otro" name="proveed_nom_contct_otro" value="{{$proveedor->proveed_nom_contct_otro}}"/>
																		</div>
																	</div>

																	<hr />
																	<div>
																		<label for="proveed_tel_contct_otro">
																			Teléfono
																		</label>

																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="ace-icon fa fa-phone"></i>
																			</span>
																			<input class="form-control" type="tel" id="proveed_tel_contct_otro" name="proveed_tel_contct_otro" value="{{$proveedor->proveed_tel_contct_otro}}"/>
																		</div>
																	</div>

																	<hr />
																	<div>
																		<label for="proveed_email_contct_otro">
																			Correo
																		</label>

																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="ace-icon fa fa-envelope"></i>
																			</span>
																			<input class="form-control" type="tel" id="proveed_email_contct_otro" name="proveed_email_contct_otro" value="{{$proveedor->proveed_email_contct_otro}}"/>
																		</div>
																	</div>

																	<hr />
																</div>
															</div>
														</div>
													</div><!-- /.span -->
												</td>
											</tr>
										</table>

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
	                            <button id="cancel" type="button" onclick="location.href = '/proveedores';" class="btn btn-info">Cancelar</button>
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
	        	$("#menuproveedor").addClass('active');
	        	$("#menudirectorio").addClass('open');

        	/*Inicializando selects*/
	        	$("#proveed_direc_id").select2({
				  	placeholder: "Selecciona el domicilio",
				  	allowClear: true
				});

				$("#proveed_tipprov_id").select2({
				  	placeholder: "Selecciona el tipo de proveedor",
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

				$("#proveed_forma_contab").select2({
				  	placeholder: "Selecciona la forma de contabilización",
				  	allowClear: true
				});

				$("#proveed_cta_egreso_id").select2({
				  	placeholder: "Selecciona la cuenta de egreso",
				  	allowClear: true
				});

				$("#proveed_cta_desc_id").select2({
				  	placeholder: "Selecciona la cuenta de descuento",
				  	allowClear: true
				});

				$("#proveed_cta_iva_acredit_x_cob_id").select2({
				  	placeholder: "Selecciona la cuenta de IVA acreditado por cobrar",
				  	allowClear: true
				});

				$("#proveed_cta_iva_acredit_cob_id").select2({
				  	placeholder: "Selecciona la cuenta de IVA acreditado cobrado",
				  	allowClear: true
				});

				$("#proveed_cta_iva_reten_x_cob_id").select2({
				  	placeholder: "Selecciona la cuenta de IVA retenido por cobrar",
				  	allowClear: true
				});

				$("#proveed_cta_iva_reten_cob_id").select2({
				  	placeholder: "Selecciona la cuenta de IVA retenido cobrado",
				  	allowClear: true
				});

				$("#proveed_cta_isr_reten_id").select2({
				  	placeholder: "Selecciona la cuenta de ISR retenido",
				  	allowClear: true
				});

				$("#proveed_cta_por_pagar_id").select2({
				  	placeholder: "Selecciona la cuenta por pagar",
				  	allowClear: true
				});

				$("#proveed_cta_anticp_prov_id").select2({
				  	placeholder: "Selecciona la cuenta de anticipo",
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
			$('#proveed_tel_contct').mask('(999) 999-9999');
			$('#proveed_tel_contct_otro').mask('(999) 999-9999');
			$('#proveed_tel').mask('(999) 999-9999');
		
			jQuery.validator.addMethod("proveed_rfc", function (value, element) {
				return this.optional(element) || /^[A-ZÑ&]{3,4}([0-9]{2})([0-1][0-9])([0-3][0-9])[A-Z0-9][A-Z0-9][0-9A]$/.test(value);
			}, "Introduzca un RFC válido.");
		
			$('#editaproveedor').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				ignore: "",
				rules: {
					proveed_nom: {
						required: true
					},
					proveed_email: {
						required: true,
						email:true
					},
					proveed_rfc: {
						required: true,
						proveed_rfc: 'required'
					},
					proveed_tel: {
						required: true
					}/*,
					proveed_tipprov_id: {
						required: true
					}*/
				},
		
				messages: {
					proveed_nom: {
						required: "Este campo es requerido."
					},
					proveed_email: {
						required: "Este campo es requerido.",
						email: "Introduzca una dirección de correo válida."
					},
					proveed_rfc: {
						required: "Este campo es requerido."
					},
					proveed_tel: {
						required: "Este campo es requerido."
					},
					proveed_tipprov_id: {
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

		</script>

@endsection