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
	            <a href="#">Configurar Contabilidad</a>
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

	<input type="hidden" name="step" id="step" value="{{$wstep}}">
	<div class="row">
		<div class="widget-box">
			<div class="widget-header widget-header-blue widget-header-flat">
				<h4 class="widget-title lighter">Asistente de configuración</h4>

				
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div id="fuelux-wizard-container">
						<div>
							<ul class="steps">
								<li data-step="1" class="{{$wstep == 1 ? 'active':''}}">
									<span class="step">1</span>
									<span class="title">Plan Contable</span>
								</li>

								<li data-step="2" class="{{$wstep == 2 ? 'active':''}}">
									<span class="step">2</span>
									<span class="title">Cuentas para clientes</span>
								</li>

								<li data-step="3" class="{{$wstep == 3 ? 'active':''}}">
									<span class="step">3</span>
									<span class="title">Cuentas para proveedores</span>
								</li>

								<li data-step="4" class="{{$wstep == 4 ? 'active':''}}">
									<span class="step">4</span>
									<span class="title">Confirmación</span>
								</li>
							</ul>
						</div>

						<hr />

						
							<div class="step-content pos-rel">
								<div class="step-pane active {{$wstep == 1 ? '':'hidden'}}" data-step="1">
									<h3 class="lighter block green">Configure el plan contable a usar</h3>
									<form class="form-horizontal" id="validation-form" method="post" action="{{ route('configpc') }}" enctype="multipart/form-data">
										{{ csrf_field() }}

										<div class="form-group">
											<label class="control-label col-md-3 col-sm-3 col-xs-12" for="default_pc">Quiere usar el plan contable por defecto ?: </label>
											    <div class="col-md-2 col-sm-2 col-xs-12">
											    	<label>
														<input name="default_pc" id="default_pc" class="ace ace-switch" type="checkbox"/>
														<span class="lbl" data-lbl="Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No"></span>
													</label>
												</div>

										</div>

										<div class="form-group" id="excelpccontainer">
											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="excel_link">Descargue la plantilla:</label>
										    <div class="col-md-1 col-sm-1 col-xs-12">
										    	<a href='/downloadpc'>Aquí</a>
											</div>

											<label class="control-label col-md-2 col-sm-2 col-xs-12" for="excel_link">Llene la plantilla y súbala:</label>
										    <div class="col-md-1 col-sm-1 col-xs-12">
										    	<input type="file" name="file" id="file">
											</div>
										</div>

									</form>

								</div>

								<div class="step-pane" data-step="2">
									<div>
										<form class="form-horizontal" id="fclients" method="post" action="{{ route('configpcclients') }}" >
											{{ csrf_field() }}
											<table width="100%">
												<tr>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cliente_cta_anticp_client_id">Cuenta de anticipo:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_anticp_client_id" id="cliente_cta_anticp_client_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccac)
									                            	<option value="{{ $ccac->id }}" {{$confimodel->cliente_cta_anticp_client_id == $ccac->id ? 'selected':''}}>{{ $ccac->ctacont_catsat_cod }} - {{ $ccac->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>


													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cliente_cta_desc_id">Cuenta de descuento:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_desc_id" id="cliente_cta_desc_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccd)
									                            	<option value="{{ $ccd->id }}" {{$confimodel->cliente_cta_desc_id == $ccd->id ? 'selected':''}}>{{ $ccd->ctacont_catsat_cod }} - {{ $ccd->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
													

												</tr>
												<tr>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cliente_cta_ingreso_id">Cuenta de ingreso:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_ingreso_id" id="cliente_cta_ingreso_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $cci)
									                            	<option value="{{ $cci->id }}" {{$confimodel->cliente_cta_ingreso_id == $cci->id ? 'selected':''}}>{{ $cci->ctacont_catsat_cod }} - {{ $cci->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>

													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cliente_cta_por_cobrar_id">Cuenta por cobrar:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_por_cobrar_id" id="cliente_cta_por_cobrar_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccpc)
									                            	<option value="{{ $ccpc->id }}" {{$confimodel->cliente_cta_por_cobrar_id == $ccpc->id ? 'selected':''}}>{{ $ccpc->ctacont_catsat_cod }} - {{ $ccpc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>

													
												</tr>
												<tr>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cliente_cta_iva_traslad_x_cob_id">Cuenta IVA trasladado por cobrar:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_iva_traslad_x_cob_id" id="cliente_cta_iva_traslad_x_cob_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccitxc)
									                            	<option value="{{ $ccitxc->id }}" {{$confimodel->cliente_cta_iva_traslad_x_cob_id == $ccitxc->id ? 'selected':''}}>{{ $ccitxc->ctacont_catsat_cod }} - {{ $ccitxc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cliente_cta_iva_traslad_cob_id">Cuenta IVA trasladado cobrado:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_iva_traslad_cob_id" id="cliente_cta_iva_traslad_cob_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccitc)
									                            	<option value="{{ $ccitc->id }}" {{$confimodel->cliente_cta_iva_traslad_cob_id == $ccitc->id ? 'selected':''}}>{{ $ccitc->ctacont_catsat_cod }} - {{ $ccitc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
												</tr>
												<tr>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cliente_cta_iva_reten_x_cob_id">Cuenta IVA retenido por cobrar:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_iva_reten_x_cob_id" id="cliente_cta_iva_reten_x_cob_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccirxc)
									                            	<option value="{{ $ccirxc->id }}" {{$confimodel->cliente_cta_iva_reten_x_cob_id == $ccirxc->id ? 'selected':''}}>{{ $ccirxc->ctacont_catsat_cod }} - {{ $ccirxc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cliente_cta_iva_reten_cob_id">Cuenta IVA retenido cobrado:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_iva_reten_cob_id" id="cliente_cta_iva_reten_cob_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccirc)
									                            	<option value="{{ $ccirc->id }}" {{$confimodel->cliente_cta_iva_reten_cob_id == $ccirc->id ? 'selected':''}}>{{ $ccirc->ctacont_catsat_cod }} - {{ $ccirc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
												</tr>
												<tr>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cliente_cta_isr_reten_id">Cuenta ISR retenido por cobrar:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_isr_reten_id" id="cliente_cta_isr_reten_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccir)
									                            	<option value="{{ $ccir->id }}" {{$confimodel->cliente_cta_isr_reten_id == $ccir->id ? 'selected':''}}>{{ $ccir->ctacont_catsat_cod }} - {{ $ccir->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
													
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cliente_cta_isr_reten_cob_id">Cuenta de ISR retenido cobrado:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_isr_reten_cob_id" id="cliente_cta_isr_reten_cob_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccac)
									                            	<option value="{{ $ccac->id }}" {{$confimodel->cliente_cta_isr_reten_cob_id == $ccac->id ? 'selected':''}}>{{ $ccac->ctacont_catsat_cod }} - {{ $ccac->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>

												</tr>

												<tr>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cliente_cta_ieps_por_cobrar_id">Cuenta IEPS trasladado por cobrar:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_ieps_por_cobrar_id" id="cliente_cta_ieps_por_cobrar_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccir)
									                            	<option value="{{ $ccir->id }}" {{$confimodel->cliente_cta_ieps_por_cobrar_id == $ccir->id ? 'selected':''}}>{{ $ccir->ctacont_catsat_cod }} - {{ $ccir->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cliente_cta_ieps_cobrado_id">Cuenta IEPS trasladado cobrado:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_ieps_cobrado_id" id="cliente_cta_ieps_cobrado_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccpc)
									                            	<option value="{{ $ccpc->id }}" {{$confimodel->cliente_cta_ieps_cobrado_id == $ccpc->id ? 'selected':''}}>{{ $ccpc->ctacont_catsat_cod }} - {{ $ccpc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
												</tr>


												<tr>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="cliente_cta_ieps_reten_por_cobrar_id">Cuenta IEPS retenido por cobrar:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_ieps_reten_por_cobrar_id" id="cliente_cta_ieps_reten_por_cobrar_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccir)
									                            	<option value="{{ $ccir->id }}" {{$confimodel->cliente_cta_ieps_reten_por_cobrar_id == $ccir->id ? 'selected':''}}>{{ $ccir->ctacont_catsat_cod }} - {{ $ccir->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="cliente_cta_ieps_reten_cobrado_id">Cuenta IEPS retenido cobrado:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="cliente_cta_ieps_reten_cobrado_id" id="cliente_cta_ieps_reten_cobrado_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccpc)
									                            	<option value="{{ $ccpc->id }}" {{$confimodel->cliente_cta_ieps_reten_cobrado_id == $ccpc->id ? 'selected':''}}>{{ $ccpc->ctacont_catsat_cod }} - {{ $ccpc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
												</tr>

											</table>
											<div class="form-group">
												<label class="control-label col-md-1 col-sm-1 col-xs-12" for="cliente_concepto">Concepto:</label>
												<input type="text" name="cliente_concepto" id="cliente_concepto" class="col-md-11 col-sm-11 col-xs-12">
											</div>
										</form>
									</div>
								</div>

								<div class="step-pane" data-step="3">
									<form class="form-horizontal" id="validation-form-provs" method="post" action="{{ route('configpcprovs') }}" >
										{{ csrf_field() }}
										<table width="100%">
												<tr>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveed_cta_anticp_prov_id">Cuenta de anticipo:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_anticp_prov_id" id="proveed_cta_anticp_prov_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccac)
									                            	<option value="{{ $ccac->id }}" {{$confimodel->proveed_cta_anticp_prov_id == $ccac->id ? 'selected':''}}>{{ $ccac->ctacont_catsat_cod }} - {{ $ccac->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>

													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_cta_desc_id">Cuenta de descuento:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_desc_id" id="proveed_cta_desc_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccd)
									                            	<option value="{{ $ccd->id }}" {{$confimodel->proveed_cta_desc_id == $ccd->id ? 'selected':''}}>{{ $ccd->ctacont_catsat_cod }} - {{ $ccd->ctacont_desc }}</option>
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
								                            	@foreach($cuentas as $cci)
									                            	<option value="{{ $cci->id }}" {{$confimodel->proveed_cta_egreso_id == $cci->id ? 'selected':''}}>{{ $cci->ctacont_catsat_cod }} - {{ $cci->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>

													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_cta_por_pagar_id">Cuenta por pagar:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_por_pagar_id" id="proveed_cta_por_pagar_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccpc)
									                            	<option value="{{ $ccpc->id }}" {{$confimodel->proveed_cta_por_pagar_id == $ccpc->id ? 'selected':''}}>{{ $ccpc->ctacont_catsat_cod }} - {{ $ccpc->ctacont_desc }}</option>
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
								                            	@foreach($cuentas as $ccitxc)
									                            	<option value="{{ $ccitxc->id }}" {{$confimodel->proveed_cta_iva_acredit_x_cob_id == $ccitxc->id ? 'selected':''}}>{{ $ccitxc->ctacont_catsat_cod }} - {{ $ccitxc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_cta_iva_acredit_cob_id">Cuenta IVA acreditado cobrado:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_iva_acredit_cob_id" id="proveed_cta_iva_acredit_cob_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccitc)
									                            	<option value="{{ $ccitc->id }}" {{$confimodel->proveed_cta_iva_acredit_cob_id == $ccitc->id ? 'selected':''}}>{{ $ccitc->ctacont_catsat_cod }} - {{ $ccitc->ctacont_desc }}</option>
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
								                            	@foreach($cuentas as $ccirxc)
									                            	<option value="{{ $ccirxc->id }}" {{$confimodel->proveed_cta_iva_reten_x_cob_id == $ccirxc->id ? 'selected':''}}>{{ $ccirxc->ctacont_catsat_cod }} - {{ $ccirxc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_cta_iva_reten_cob_id">Cuenta IVA retenido cobrado:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_iva_reten_cob_id" id="proveed_cta_iva_reten_cob_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccirc)
									                            	<option value="{{ $ccirc->id }}" {{$confimodel->proveed_cta_iva_reten_cob_id == $ccirc->id ? 'selected':''}}>{{ $ccirc->ctacont_catsat_cod }} - {{ $ccirc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
												</tr>
												<tr>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveed_cta_isr_reten_id">Cuenta ISR retenido por cobrar:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_isr_reten_id" id="proveed_cta_isr_reten_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccir)
									                            	<option value="{{ $ccir->id }}" {{$confimodel->proveed_cta_isr_reten_id == $ccir->id ? 'selected':''}}>{{ $ccir->ctacont_catsat_cod }} - {{ $ccir->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
													
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_cta_isr_reten_cob_id">Cuenta de ISR retenido cobrado:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_isr_reten_cob_id" id="proveed_cta_isr_reten_cob_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccac)
									                            	<option value="{{ $ccac->id }}" {{$confimodel->proveed_cta_isr_reten_cob_id == $ccac->id ? 'selected':''}}>{{ $ccac->ctacont_catsat_cod }} - {{ $ccac->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>

												</tr>

												<tr>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveed_cta_ieps_por_cobrar_id">Cuenta IEPS trasladado por cobrar:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_ieps_por_cobrar_id" id="proveed_cta_ieps_por_cobrar_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccir)
									                            	<option value="{{ $ccir->id }}" {{$confimodel->proveed_cta_ieps_por_cobrar_id == $ccir->id ? 'selected':''}}>{{ $ccir->ctacont_catsat_cod }} - {{ $ccir->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_cta_ieps_cobrado_id">Cuenta IEPS trasladado cobrado:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_ieps_cobrado_id" id="proveed_cta_ieps_cobrado_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccpc)
									                            	<option value="{{ $ccpc->id }}" {{$confimodel->proveed_cta_ieps_cobrado_id == $ccpc->id ? 'selected':''}}>{{ $ccpc->ctacont_catsat_cod }} - {{ $ccpc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
												</tr>


												<tr>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-3 col-sm-3 col-xs-12" for="proveed_cta_ieps_reten_por_cobrar_id">Cuenta IEPS retenido por cobrar:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_ieps_reten_por_cobrar_id" id="proveed_cta_ieps_reten_por_cobrar_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccir)
									                            	<option value="{{ $ccir->id }}" {{$confimodel->proveed_cta_ieps_reten_por_cobrar_id == $ccir->id ? 'selected':''}}>{{ $ccir->ctacont_catsat_cod }} - {{ $ccir->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
													<td width="50%">
														<div class="form-group">
															<label class="control-label col-md-4 col-sm-4 col-xs-12" for="proveed_cta_ieps_reten_cobrado_id">Cuenta IEPS retenido cobrado:</label>
								                          	<select class="js-example-basic-single js-states form-control" name="proveed_cta_ieps_reten_cobrado_id" id="proveed_cta_ieps_reten_cobrado_id" style="width: 60%; display: none;">
								                            	<option value="">Seleccione ...</option>
								                            	@foreach($cuentas as $ccpc)
									                            	<option value="{{ $ccpc->id }}" {{$confimodel->proveed_cta_ieps_reten_cobrado_id == $ccpc->id ? 'selected':''}}>{{ $ccpc->ctacont_catsat_cod }} - {{ $ccpc->ctacont_desc }}</option>
									                            @endforeach
								                          	</select>
								                        </div>
													</td>
												</tr>

											</table>

											<div class="form-group">
												<label class="control-label col-md-1 col-sm-1 col-xs-12" for="proveedor_concepto">Concepto:</label>
												<input type="text" name="proveedor_concepto" id="proveedor_concepto" class="col-md-11 col-sm-11 col-xs-12">
											</div>
									</form>
								</div>

								<div class="step-pane" data-step="4">
									<form class="form-horizontal" id="validation-form-finish" method="post" action="{{ route('configpcfinish') }}" >
										{{ csrf_field() }}
										<div class="center">
											<h3 class="green">Confirmar Configuración</h3>
											Si confirma la configuración se aplicarán los cambios. Asegúrese de tener todo correcto.
										</div>
									</form>
									
								</div>
							</div>
						
					</div>

					<hr />
					<div class="wizard-actions">
						<button class="btn btn-prev">
							<i class="ace-icon fa fa-arrow-left"></i>
							Anterior
						</button>

						<button class="btn btn-success btn-next" data-last="Ok">
							Siguiente
							<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
						</button>
					</div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div>
	</div>
@endsection

@section('app_js')
        @parent
        <!--<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>-->

        <script src="{{ asset('ac_theme/assets/js/wizard.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery-additional-methods.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/bootbox.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.maskedinput.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/select2.min.js') }}"></script>

        <!-- ace scripts -->
        <script src="{{ asset('ac_theme/assets/js/ace-elements.min.js') }}"></script>
        <script src="{{ asset('ac_theme/assets/js/ace.min.js') }}"></script>
        
        <script type="text/javascript">

        $.each(document.getElementById("menus").getElementsByTagName("li"), function( index, value ) {
		  value.classList.remove("active");
		});
    	$("#menuconfigwizard").addClass('active');
    	$("#menuacciones").addClass('open');

		/*Clientes*/
		$("#cliente_cta_ingreso_id").select2({
		  	placeholder: "Selecciona la cuenta de ingreso",
		  	allowClear: true
		});

		$("#cliente_cta_desc_id").select2({
		  	placeholder: "Selecciona la cuenta de descuento",
		  	allowClear: true
		});

		$("#cliente_cta_iva_traslad_x_cob_id").select2({
		  	placeholder: "Selecciona la cuenta de IVA trasladado por cobrar",
		  	allowClear: true
		});

		$("#cliente_cta_iva_traslad_cob_id").select2({
		  	placeholder: "Selecciona la cuenta de IVA trasladado cobrado",
		  	allowClear: true
		});

		$("#cliente_cta_iva_reten_x_cob_id").select2({
		  	placeholder: "Selecciona la cuenta de IVA retenido por cobrar",
		  	allowClear: true
		});

		$("#cliente_cta_iva_reten_cob_id").select2({
		  	placeholder: "Selecciona la cuenta de IVA retenido cobrado",
		  	allowClear: true
		});

		$("#cliente_cta_isr_reten_id").select2({
		  	placeholder: "Selecciona la cuenta de ISR retenido por cobrar",
		  	allowClear: true
		});

		$("#cliente_cta_por_cobrar_id").select2({
		  	placeholder: "Selecciona la cuenta por cobrar",
		  	allowClear: true
		});

		$("#cliente_cta_anticp_client_id").select2({
		  	placeholder: "Selecciona la cuenta de anticipo",
		  	allowClear: true
		});

		$("#cliente_cta_isr_reten_cob_id").select2({
		  	placeholder: "Selecciona la cuenta de isr retenido cobrado",
		  	allowClear: true
		});

		$("#cliente_cta_ieps_por_cobrar_id").select2({
		  	placeholder: "Selecciona la cuenta de ieps trasladado por cobrar",
		  	allowClear: true
		});

		$("#cliente_cta_ieps_cobrado_id").select2({
		  	placeholder: "Selecciona la cuenta de ieps trasladado cobrado",
		  	allowClear: true
		});


		$("#cliente_cta_ieps_reten_por_cobrar_id").select2({
		  	placeholder: "Selecciona la cuenta de ieps retenido por cobrar",
		  	allowClear: true
		});

		$("#cliente_cta_ieps_reten_cobrado_id").select2({
		  	placeholder: "Selecciona la cuenta de ieps retenido cobrado",
		  	allowClear: true
		});


		/*Proveedores*/
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

		$("#proveed_cta_isr_reten_cob_id").select2({
		  	placeholder: "Selecciona la cuenta de isr retenido cobrado",
		  	allowClear: true
		});

		$("#proveed_cta_ieps_por_cobrar_id").select2({
		  	placeholder: "Selecciona la cuenta de ieps trasladado por cobrar",
		  	allowClear: true
		});

		$("#proveed_cta_ieps_cobrado_id").select2({
		  	placeholder: "Selecciona la cuenta de ieps trasladado cobrado",
		  	allowClear: true
		});


		$("#proveed_cta_ieps_reten_por_cobrar_id").select2({
		  	placeholder: "Selecciona la cuenta de ieps retenido por cobrar",
		  	allowClear: true
		});

		$("#proveed_cta_ieps_reten_cobrado_id").select2({
		  	placeholder: "Selecciona la cuenta de ieps retenido cobrado",
		  	allowClear: true
		});


        console.log(document.getElementById('step').value);

			$('#fuelux-wizard-container')
			.ace_wizard({
				step: parseInt(document.getElementById('step').value) //optional argument. wizard will jump to step "2" at first
				//buttons: '.wizard-actions:eq(0)'
			})
			.on('actionclicked.fu.wizard' , function(e, info){
				console.log(info);
				if(info.direction=='previous'){
					window.location.href = info.step - 1;
				}else{
					if(info.step == 1) {
						//if(!$('#validation-form').valid()) e.preventDefault();
						$('#loadingmodal').modal('show');
						$('#validation-form').submit();
					}else if(info.step == 2){
						if(!$('#fclients').valid()){
							e.preventDefault();
						}else{
							console.log('bb');
							$('#loadingmodal').modal('show');
							$('#fclients').submit();
						}
					}else if(info.step == 3){
						if(!$('#validation-form-provs').valid()){
							e.preventDefault();
						}else{
							$('#loadingmodal').modal('show');
							$('#validation-form-provs').submit();
						}

					}else{
						$('#loadingmodal').modal('show');
						$('#validation-form-finish').submit();
					}
				}
				
			})
			.on('changed.fu.wizard', function(e, info) {
				console.log(info);
			})
			.on('finished.fu.wizard', function(e) {
				/*bootbox.dialog({
					message: "Thank you! Your information was successfully saved!", 
					buttons: {
						"success" : {
							"label" : "OK",
							"className" : "btn-sm btn-primary"
						}
					}
				});*/
				$('#loadingmodal').modal('show');
				$('#validation-form-finish').submit();
			}).on('stepclicked.fu.wizard', function(e){
				e.preventDefault();//this will prevent clicking and selecting steps
			});

			/*$.mask.definitions['~']='[+-]';
				$('#phone').mask('(999) 999-9999');
			
				jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Enter a valid phone number.");*/
			
				$('#fclients').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						cliente_cta_ingreso_id: {
							required: true
						},
						cliente_cta_desc_id: {
							required: true
						},
						cliente_cta_iva_traslad_x_cob_id: {
							required: true
						},
						cliente_cta_iva_traslad_cob_id: {
							required: true
						},
						cliente_cta_iva_reten_x_cob_id: {
							required: true
						},
						cliente_cta_iva_reten_cob_id: {
							required: true
						},
						cliente_cta_isr_reten_id: {
							required: true
						},
						cliente_cta_por_cobrar_id: {
							required: true
						},
						cliente_cta_anticp_client_id: {
							required: true
						},
						cliente_cta_isr_reten_cob_id: {
							required: true
						},
						cliente_cta_ieps_por_cobrar_id: {
							required: true
						},
						cliente_cta_ieps_cobrado_id: {
							required: true
						},
						cliente_cta_ieps_reten_por_cobrar_id: {
							required: true
						},
						cliente_cta_ieps_reten_cobrado_id: {
							required: true
						}

					},
			
					messages: {
						cliente_cta_ingreso_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_desc_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_iva_traslad_x_cob_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_iva_traslad_cob_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_iva_reten_x_cob_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_iva_reten_cob_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_isr_reten_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_por_cobrar_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_anticp_client_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_isr_reten_cob_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_ieps_por_cobrar_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_ieps_cobrado_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_ieps_reten_por_cobrar_id: {
							required: "Este campo es requerido"
						},
						cliente_cta_ieps_reten_cobrado_id: {
							required: "Este campo es requerido"
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
					}
				});


				$('#validation-form-provs').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					ignore: "",
					rules: {
						proveed_cta_egreso_id: {
							required: true
						},
						proveed_cta_desc_id: {
							required: true
						},
						proveed_cta_iva_acredit_x_cob_id: {
							required: true
						},
						proveed_cta_iva_acredit_cob_id: {
							required: true
						},
						proveed_cta_iva_reten_x_cob_id: {
							required: true
						},
						proveed_cta_iva_reten_cob_id: {
							required: true
						},
						proveed_cta_isr_reten_id: {
							required: true
						},
						proveed_cta_por_pagar_id: {
							required: true
						},
						proveed_cta_anticp_prov_id: {
							required: true
						},
						proveed_cta_isr_reten_cob_id: {
							required: true
						},
						proveed_cta_ieps_por_cobrar_id: {
							required: true
						},
						proveed_cta_ieps_cobrado_id: {
							required: true
						},
						proveed_cta_ieps_reten_por_cobrar_id: {
							required: true
						},
						proveed_cta_ieps_reten_cobrado_id: {
							required: true
						}
						
					},
			
					messages: {
						proveed_cta_egreso_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_desc_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_iva_acredit_x_cob_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_iva_acredit_cob_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_iva_reten_x_cob_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_iva_reten_cob_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_isr_reten_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_por_pagar_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_anticp_prov_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_isr_reten_cob_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_ieps_por_cobrar_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_ieps_cobrado_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_ieps_reten_por_cobrar_id: {
							required: "Este campo es requerido"
						},
						proveed_cta_ieps_reten_cobrado_id: {
							required: "Este campo es requerido"
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
					}
				});

        </script>
@endsection