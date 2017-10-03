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
	<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/bootstrap-editable.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/jquery.gritter.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('ac_theme/assets/css/bootstrap-editable.min.css') }}" />
	<link rel="stylesheet" href="{{ asset('css/fileinput.css') }}" />
@endsection

@section('breadcrumbs')
	<div class="breadcrumbs ace-save-state" id="breadcrumbs">
	    <ul class="breadcrumb">
	        <li>
	            <i class="ace-icon fa fa-group home-icon"></i>
	            <a href="#">Editar Permiso</a>
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
				{{ Form::open(['route' => ['permisos.update', $permiso->id], 'class'=>'form-horizontal form-label-left', 'id'=>'editapermiso']) }}
					{{ Form::hidden('_method', 'PUT') }}

					
						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-2 col-md-2" for="cliente_nom">Nombre:</label>
							<div class="col-md-10 col-sm-10 col-xs-12">
								<div class="clearfix">
									<input type="text" name="name" id="name" class="col-md-10 col-sm-10 col-xs-12" value="{{ $permiso->name }}"/>
								</div>
								@if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-2 col-md-2" for="cliente_nom">Código:</label>
							<div class="col-md-10 col-sm-10 col-xs-12">
								<div class="clearfix">
									<input type="text" name="slug" readonly="true" id="slug" class="col-md-10 col-sm-10 col-xs-12" value="{{ $permiso->slug }}"/>
								</div>
								@if ($errors->has('slug'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('slug') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-xs-12 col-sm-2 col-md-2" for="password">Descripción:</label>
							<div class="col-md-10 col-sm-10 col-xs-12">
								<div class="clearfix">
									<input type="text" name="description" id="description" class="col-md-10 col-sm-10 col-xs-12" value="{{ $permiso->description }}"/>
								</div>
								@if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong style="color: red;">{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
							</div>
						</div>


					<div class="col-md-12 col-sm-12 col-xs-12">
							</br>
							</br>
						</div>


							

					</br>

					<div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button id="cancel" type="button" onclick="location.href = '/permisos';" class="btn btn-info">Cancelar</button>
                  		    <button id="send" type="submit" class="btn btn-success">Guardar</button>
                        </div>
                    </div>

				{{ Form::close() }}

			</div>
	</div>
@endsection

@section('app_js')
        @parent
		<script src="{{ asset('ac_theme/assets/js/jquery-ui.custom.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.ui.touch-punch.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.gritter.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/bootbox.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.easypiechart.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/bootstrap-datepicker.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.hotkeys.index.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/bootstrap-wysiwyg.min.js') }}"></script>
		<script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/spinbox.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/bootstrap-editable.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/ace-editable.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery.maskedinput.min.js') }}"></script>

		<!-- ace scripts -->
		<script src="{{ asset('ac_theme/assets/js/ace-elements.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/ace.min.js') }}"></script>

		<script src="{{ asset('ac_theme/assets/js/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery-additional-methods.min.js') }}"></script>


		<script type="text/javascript">



			$('#editapermiso').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				ignore: "",
				rules: {
					name: {
						required: true
					},
					slug: {
						required: true,
						maxlength: 10
					},
					description: {
						required: true
					}
				},
		
				messages: {
					name: {
						required: "Este campo es requerido."
					},
					slug: {
						required: "Este campo es requerido.",
						maxlength: "El código es de máximo 10 caracteres"
					},
					description: {
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