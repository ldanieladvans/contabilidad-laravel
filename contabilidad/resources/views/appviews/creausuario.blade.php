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
	            <a href="#">Crear Usuario</a>
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
				<form class="form-horizontal" action="{{ route('usuarios.store') }}" method='POST' id="creausuario" enctype="multipart/form-data">
					{{ csrf_field() }}

					<table border="0" class="col-md-12 col-sm-12 col-xs-12">
						<tr>
							<td width="20%">
								<!--<span class="profile-picture">
									<input type="file" id="avatar" name="avatar" alt="Perfil" src="{{ asset('default_avatar_male.jpg') }}"/>
								</span>-->
								<div class="row">
							        <div class="col-md-2 col-sm-2 col-xs-2">
				                		<div id="imgcontainer" class="file-preview-frame">
					                		<img id='imageiddef' src="{{asset('default_avatar_male.jpg')}}" hidden>
					                		<img id="blah" alt="your image" width="150" height="150" src="{{asset('default_avatar_male.jpg')}}" />
					                		<button id="cleanpic" type="button" onclick="cleanFunc();"  class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
					                	</div>
					                	
				                	</div>
			            		</div>

							</td>
							<td>
								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-2 col-md-2" for="cliente_nom">Nombre:</label>
									<div class="col-md-10 col-sm-10 col-xs-12">
										<div class="clearfix">
											<input type="text" name="name" id="name" class="col-md-10 col-sm-10 col-xs-12" value="{{ old('name') }}"/>
										</div>
										@if ($errors->has('name'))
		                                    <span class="help-block">
		                                        <strong style="color: red;">{{ $errors->first('name') }}</strong>
		                                    </span>
		                                @endif
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-2 col-md-2" for="cliente_nom">Correo/Usuario:</label>
									<div class="col-md-10 col-sm-10 col-xs-12">
										<div class="clearfix">
											<input type="email" name="email" id="email" class="col-md-10 col-sm-10 col-xs-12" value="{{ old('email') }}"/>
										</div>
										@if ($errors->has('email'))
		                                    <span class="help-block">
		                                        <strong style="color: red;">{{ $errors->first('email') }}</strong>
		                                    </span>
		                                @endif
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-2 col-md-2" for="password">Contraseña:</label>
									<div class="col-md-10 col-sm-10 col-xs-12">
										<div class="clearfix">
											<input type="password" name="password" id="password" class="col-md-10 col-sm-10 col-xs-12"/>
										</div>
										@if ($errors->has('password'))
		                                    <span class="help-block">
		                                        <strong style="color: red;">{{ $errors->first('password') }}</strong>
		                                    </span>
		                                @endif
									</div>
								</div>

								<div class="form-group">
									<label class="control-label col-xs-12 col-sm-2 col-md-2" for="password_confirm">Confirmar Contraseña:</label>
									<div class="col-md-10 col-sm-10 col-xs-12">
										<div class="clearfix">
											<input type="password" name="password_confirmation" id="password-confirm" class="col-md-10 col-sm-10 col-xs-12"/>
										</div>
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td>
								<div id="fileinputcontainer" class="col-md-6 col-sm-6 col-xs-6">
		                			<input id="usrc_pic" name="usrc_pic" style='position:absolute;z-index:2;top:0;' type="file"/>
		                		</div>
							</td>
							<td></td>
						</tr>
					</table>

					<div class="col-md-12 col-sm-12 col-xs-12">
							</br>
							</br>
						</div>

					
					<div class="form-group">
						<label class="control-label col-xs-12 col-sm-1 col-md-1" for="cliente_nom">Teléfono:</label>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<div class="clearfix">
								<input type="tel" name="usrc_tel" id="usrc_tel" class="col-md-10 col-sm-10 col-xs-12" value="{{ old('usrc_tel') }}"/>
							</div>
						</div>
					

						<label class="control-label col-md-1 col-sm-1 col-xs-12" for="usrc_type">Tipo:</label>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<select class="js-example-basic-single js-states form-control" id="usrc_type" name="usrc_type" data-placeholder="Seleccione el tipo de usuario ..." style="width: 73%; display: none;">
	                        	<option value="app" selected>Aplicación</option>
	                        	<option value="api">Servicio</option>
							</select>
						</div>

					</div>
							

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
										<div class="item form-group">
							                <div class="col-md-10 col-sm-10 col-xs-12">
							                    <select id="roles" name="roles[]" tabindex="1" data-placeholder="Seleccione los roles ..." class="js-example-basic-multiple" onchange="onSelectUserCreate(this)" multiple="multiple" style="width: 100%; display: none;">
							                        @foreach($roles as $role)
														<option value="{{ $role->id }}">{{ $role->name }}</option>
													@endforeach
							                    </select>
							                </div>
							            </div>

							            <div class="item form-group">
						                    <div class="col-md-10 col-sm-10 col-xs-12">
						                        <select id="permisos" name="permisos[]" tabindex="2" data-placeholder="Seleccione los permisos ..." class="js-example-basic-multiple" multiple="multiple" style="width: 100%; display: none;">
													@foreach($permisos as $permiso)
						                            	<option value="{{ $permiso->id }}">{{ $permiso->name }}</option>
						                            @endforeach
						                      </select>
						                  	</div>
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

		<script src="{{ asset('ac_theme/assets/js/jquery.validate.min.js') }}"></script>
		<script src="{{ asset('ac_theme/assets/js/jquery-additional-methods.min.js') }}"></script>


		<script type="text/javascript">

			/* Marcando el menú seleccionado */
	        	$.each(document.getElementById("menus").getElementsByTagName("li"), function( index, value ) {
				  value.classList.remove("active");
				});
	        	$("#menuusuarios").addClass('active');
	        	$("#menuseguridad").addClass('open');

			$("#roles").select2({
	            placeholder: "Selecciona los roles",
	            allowClear: true
	        });

	        $("#permisos").select2({
	            placeholder: "Selecciona los permisos",
	            allowClear: true
	        });

	        $("#usrc_type").select2({
	            placeholder: "Seleccione el tipo de usuario ...",
	            allowClear: true
	        });

			/*jQuery(function($) {
			
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
				
			});*/

			function cleanFunc(){
				$("#blah").attr("src", document.getElementById('imageiddef').src);
				$("#usrc_pic").val('');
	    	}


	    	$("#usrc_pic").on('change', function () {

			     var countFiles = $(this)[0].files.length;
			     console.log();
			     var imgPath = $(this)[0].value;
			     var extn = imgPath.substring(imgPath.lastIndexOf('.') + 1).toLowerCase();


			     if (extn == "gif" || extn == "png" || extn == "jpg" || extn == "jpeg") {
			         if (typeof (FileReader) != "undefined") {
			             for (var i = 0; i < countFiles; i++) {

			                 var reader = new FileReader();
			                 reader.onload = function (e) {
			                     $("#blah").attr("src", e.target.result);
			                 }
			                 reader.readAsDataURL($(this)[0].files[i]);
			             }

			         } else {
			             alert("This browser does not support FileReader.");
			         }
			     } else {
			         alert("Pls select only images");
			     }
			 });

			$.mask.definitions['~']='[+-]';
			$('#usrc_tel').mask('(999) 999-9999');
			jQuery.validator.addMethod("phone", function (value, element) {
					return this.optional(element) || /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
				}, "Ingrese un número telefónico válido.");
			$('#creausuario').validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				ignore: "",
				rules: {
					name: {
						required: true
					},
					email: {
						required: true,
						email:true
					},
					password: {
						required: true,
						minlength: 8
					},
					password_confirmation: {
						required: true,
						minlength: 8,
						equalTo: "#password"
					},
					usrc_tel: {
						required: true,
						phone: 'required'
					},
					usrc_type: {
						required: true
					}
				},
		
				messages: {
					name: {
						required: "Este campo es requerido."
					},
					email: {
						required: "Este campo es requerido.",
						email: "Introduzca una dirección de correo válida."
					},
					password: {
						required: "Este campo es requerido.",
						minlength: "La contraseña debe tener 8 carateres mínimo."
					},
					password_confirmation: {
						required: "Este campo es requerido.",
						minlength: "La contraseña debe tener 8 carateres mínimo.",
						equalTo: "Las contraseñas deben coincidir."
					},
					usrc_tel: {
						required: "Este campo es requerido."
					},
					usrc_type: {
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
					alert('correcto');
					form.submit();
				},
				invalidHandler: function (form) {
					console.log('2');
					alert('incorrecto');
				}
			});

		function getSelectValues(select){
		    var result = [];
		    var options = select && select.options;
		    var opt;
		    for (var i=0, iLen=options.length; i<iLen; i++){
		    	opt = options[i];
		    	if (opt.selected) {
		      		result.push(opt.value || opt.text);
		    	}
		    }
		    return result;
		}
		 
		function onSelectUserCreate(element){
		 	var selected = getSelectValues(element);		 	
		 	//var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
		 	$.ajax({
			    url: '/permsbyroles',
			    type: 'POST',
			    data: {_token: CSRF_TOKEN,selected:selected},
			    dataType: 'JSON',
			    success: function (data) {
			    	console.log(data);
			    	var roles = [];
			    	var perms = document.getElementById('permisos').options;
			    	data['roles'].forEach(function(entry) {
			    		roles.push(entry);
					    for(var i=0;i<perms.length;i++){
					    	if(String(perms[i].value)==String(entry)){
				    			perms[i].selected=true;
					    	}
					    }
					    $("#permisos").select2({
				            placeholder: "Selecciona los permisos",
				            allowClear: true
				        });
					});
			    	$('#permisos').trigger("chosen:updated");
			    }
			});
		}
		</script>

@endsection