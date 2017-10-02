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
				<form class="form-horizontal" action="{{ route('usuarios.store') }}" method='POST' id="creausuario">
					{{ csrf_field() }}

					<table border="0" class="col-md-12 col-sm-12 col-xs-12">
						<tr>
							<td width="20%">
								<span class="profile-picture">
									<input type="image" id="avatar" class="editable img-responsive" alt="Perfil" src="{{ asset('default_avatar_male.jpg') }}" />
								</span>
							</td>
							<td>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-2 col-md-2" for="cliente_nom">Nombre:</label>
									<div class="col-md-10 col-sm-10 col-xs-12">
										<div class="clearfix">
											<input type="text" name="name" id="name" class="col-md-10 col-sm-10 col-xs-12"/>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-2 col-md-2" for="cliente_nom">Correo/Usuario:</label>
									<div class="col-md-10 col-sm-10 col-xs-12">
										<div class="clearfix">
											<input type="email" name="email" id="email" class="col-md-10 col-sm-10 col-xs-12"/>
										</div>
									</div>
								</div>

								<!-- Agregar telefono y otros campos cuando se haga la migracion desde cero -->
							</td>
						</tr>
					</table>


					</br>

					<div class="form-group" >
						<div class="col-md-12 col-sm-12 col-xs-12" style="padding:2% 0 2% 0;">



							<div class="tabbable">
								<ul class="nav nav-tabs" id="myTab">
									<li class="active">
										<a data-toggle="tab" href="#home">
											<i class="green ace-icon fa fa-lock bigger-120"></i>
											Seguridad
										</a>
									</li>
								</ul>



								<div class="tab-content">
									<div id="home" class="tab-pane fade in active">
										<div>
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                            <button id="cancel" type="button" onclick="location.href = '/usuarios';" class="btn btn-info">Cancelar</button>
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


		<script type="text/javascript">
			jQuery(function($) {
			
				//editables on first profile page
				$.fn.editable.defaults.mode = 'inline';
				$.fn.editableform.loading = "<div class='editableform-loading'><i class='ace-icon fa fa-spinner fa-spin fa-2x light-blue'></i></div>";
			    $.fn.editableform.buttons = '<button type="submit" class="btn btn-info editable-submit"><i class="ace-icon fa fa-check"></i></button>'+
			                                '<button type="button" class="btn editable-cancel"><i class="ace-icon fa fa-times"></i></button>';    
						
				
				// *** editable avatar *** //
				try {//ie8 throws some harmless exceptions, so let's catch'em
			
					//first let's add a fake appendChild method for Image element for browsers that have a problem with this
					//because editable plugin calls appendChild, and it causes errors on IE at unpredicted points
					try {
						document.createElement('IMG').appendChild(document.createElement('B'));
					} catch(e) {
						Image.prototype.appendChild = function(el){}
					}
			
					var last_gritter
					$('#avatar').editable({
						type: 'image',
						name: 'avatar',
						value: null,
						//onblur: 'ignore',  //don't reset or hide editable onblur?!
						image: {
							//specify ace file input plugin's options here
							btn_choose: 'Cambiar Imagen',
							droppable: true,
							maxSize: 1100000,//~1000Kb
			
							//and a few extra ones here
							name: 'avatar',//put the field name here as well, will be used inside the custom plugin
							on_error : function(error_type) {//on_error function will be called when the selected file has a problem
								if(last_gritter) $.gritter.remove(last_gritter);
								if(error_type == 1) {//file format error
									last_gritter = $.gritter.add({
										title: 'El archivo no es una imagen',
										text: 'Seleccione alguno de los siguientes formatos jpg|gif|png',
										class_name: 'gritter-error gritter-center'
									});
								} else if(error_type == 2) {//file size rror
									last_gritter = $.gritter.add({
										title: 'La imagen es muy grande',
										text: 'La imagen no debe exceder los 1000kb',
										class_name: 'gritter-error gritter-center'
									});
								}
								else {//other error
								}
							},
							on_success : function() {
								$.gritter.removeAll();
							}
						},
					    url: function(params) {
							// ***UPDATE AVATAR HERE*** //
							//for a working upload example you can replace the contents of this function with 
							//examples/profile-avatar-update.js
			
							var deferred = new $.Deferred
			
							var value = $('#avatar').next().find('input[type=hidden]:eq(0)').val();
							if(!value || value.length == 0) {
								deferred.resolve();
								return deferred.promise();
							}
			
			
							//dummy upload
							setTimeout(function(){
								if("FileReader" in window) {
									//for browsers that have a thumbnail of selected image
									var thumb = $('#avatar').next().find('img').data('thumb');
									if(thumb) $('#avatar').get(0).src = thumb;
								}
								
								deferred.resolve({'status':'OK'});
			
								
							 } , parseInt(Math.random() * 800 + 800))
			
							return deferred.promise();
							
							// ***END OF UPDATE AVATAR HERE*** //
						},
						
						success: function(response, newValue) {
						}
					})
				}catch(e) {}
				
			});
		</script>

@endsection