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
	            <a href="#">Subir Comprobantes</a>
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

		<div>
			<form action="/acciones/subecompadd" class="dropzone well" id="dropzone">
				{{ csrf_field() }}
				
				<div class="fallback">
					<input name="file" type="file" multiple="" id="file"/>
					<input name="fnumber" type="hidden" id="fnumber" value="0" />
				</div>

			</form>
		</div>

		<div id="preview-template" class="hide">
			<div class="dz-preview dz-file-preview">
				<div class="dz-image">
					<img data-dz-thumbnail="" />
				</div>

				<div class="dz-details">
					<div class="dz-size">
						<span data-dz-size=""></span>
					</div>

					<div class="dz-filename">
						<span data-dz-name=""></span>
					</div>
				</div>

				<div class="dz-progress">
					<span class="dz-upload" data-dz-uploadprogress=""></span>
				</div>

				<div class="dz-error-message">
					<span data-dz-errormessage=""></span>
				</div>

				<div class="dz-success-mark">
					<span class="fa-stack fa-lg bigger-150">
						<i class="fa fa-circle fa-stack-2x white"></i>

						<i class="fa fa-check fa-stack-1x fa-inverse green"></i>
					</span>
				</div>

				<div class="dz-error-mark">
					<span class="fa-stack fa-lg bigger-150">
						<i class="fa fa-circle fa-stack-2x white"></i>

						<i class="fa fa-remove fa-stack-1x fa-inverse red"></i>
					</span>
				</div>
			</div>
		</div>
		
	</div>

	<div class="row">

			<label class="control-label col-md-2 col-sm-2 col-xs-12" for="tipo_comprobante">Tipo de Comprobante:</label>
			<div class="col-md-10 col-sm-10 col-xs-12">
				<select class="js-example-basic-single js-states form-control" id="tipo_comprobante" name="tipo_comprobante" data-placeholder="Seleccione el tipo de comprobante ..." style="width: 100%; display: none;">
	            	<option value="ingreso">Ingreso</option>
	            	<option value="egreso">Egreso</option>
	            	<option value="nomina">Nómina</option>
	            	<option value="pago">Pago</option>
				</select>
			</div>
		
	</div>

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
        <script src="{{ asset('ac_theme/assets/js/dropzone.min.js') }}"></script>
        <script src="{{ asset('js/select2/dist/js/select2.min.js') }}"></script>
        <!-- ace scripts -->
        <script src="{{ asset('ac_theme/assets/js/ace-elements.min.js') }}"></script>
        <script src="{{ asset('ac_theme/assets/js/ace.min.js') }}"></script>
        
        <script type="text/javascript">

        var comptype = 'ingreso';

        $("#tipo_comprobante").change(function(){
        	comptype = this.value;
        });

        function processFiles(){
        	var result = confirm("¿Está seguro que desea procesar estos archivos?");
            if(result){
                $('#loadingmodal').modal('show');
                $.ajax({
                    url: '/processfile',
                    type: 'POST',
                    data: {_token: CSRF_TOKEN,comptype:comptype},
                    dataType: 'JSON',
                    success: function (data) {
                        window.location.href = window.location.href;
                    }
                });
            }
        }

        	//var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        	/* Marcando el menú seleccionado */
	        	$.each(document.getElementById("menus").getElementsByTagName("li"), function( index, value ) {
				  value.classList.remove("active");
				});
	        	$("#menusubecomp").addClass('active');
	        	$("#menuacciones").addClass('open');

        	$("#tipo_comprobante").select2({
			  	placeholder: "Selecciona el tipo de comprobante ...",
			  	allowClear: true
			});

			
        	
        	jQuery(function($){

    		var filecounter = parseInt(document.getElementById('fnumber').value);

        console.log(filecounter);
			
			try {
			  Dropzone.autoDiscover = false;
			
			  var myDropzone = new Dropzone('#dropzone', {
			    previewTemplate: $('#preview-template').html(),
			    
				thumbnailHeight: 120,
			    thumbnailWidth: 120,
			    maxFilesize: 10,
			    addRemoveLinks: true,

			    acceptedFiles: '.xml',
				
				//addRemoveLinks : true,
				//dictRemoveFile: 'Remove',
				
				dictDefaultMessage :
				'<span class="bigger-150 bolder"><i class="ace-icon fa fa-caret-right red"></i> Arrastre sus archivos</span> para subirlos \
				<span class="smaller-80 grey">(o haga click)</span> <br /> \
				<i class="upload-icon ace-icon fa fa-cloud-upload blue fa-3x"></i>'
			,
				
			    thumbnail: function(file, dataUrl) {
			      if (file.previewElement) {
			        $(file.previewElement).removeClass("dz-file-preview");
			        var images = $(file.previewElement).find("[data-dz-thumbnail]").each(function() {
						var thumbnailElement = this;
						thumbnailElement.alt = file.name;
						thumbnailElement.src = dataUrl;
					});
			        setTimeout(function() { $(file.previewElement).addClass("dz-image-preview"); }, 1);
			      }
			    }
			
			  });

			  myDropzone.on("removedfile", function(file) {

			    //document.getElementById('filenumber').value = parseInt(document.getElementById('filenumber').value) - 1;
			    if(this.files.length == 0){
			    	$('#processb').addClass('hidden');
			    }

			    $.ajax({
		                url: '/unlinkfile',
	                	type: 'POST',
	                	data: {_token: CSRF_TOKEN,filename:file.name},
		                dataType: 'JSON',
		                success: function (data) {

		                },
		                error: function(XMLHttpRequest, textStatus, errorThrown) { 
		                    console.log(errorThrown);
		                }
		            });
			  });

			  myDropzone.on("addedfile", function(file) {
			  	 $('#processb').removeClass('hidden');
			  	
			  });
			

			
			  //simulating upload progress
			  /*var minSteps = 6,
			      maxSteps = 60,
			      timeBetweenSteps = 100,
			      bytesPerStep = 100000;
			
			  myDropzone.uploadFiles = function(files) {
			    var self = this;
			
			    for (var i = 0; i < files.length; i++) {
			      var file = files[i];
			          totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));
			
			      for (var step = 0; step < totalSteps; step++) {
			        var duration = timeBetweenSteps * (step + 1);
			        setTimeout(function(file, totalSteps, step) {
			          return function() {
			            file.upload = {
			              progress: 100 * (step + 1) / totalSteps,
			              total: file.size,
			              bytesSent: (step + 1) * file.size / totalSteps
			            };
			
			            self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
			            if (file.upload.progress == 100) {
			              file.status = Dropzone.SUCCESS;
			              self.emit("success", file, 'success', null);
			              self.emit("complete", file);
			              self.processQueue();
			            }
			          };
			        }(file, totalSteps, step), duration);
			      }
			    }
			   }*/
			
			   
			   //remove dropzone instance when leaving this page in ajax mode
			   $(document).one('ajaxloadstart.page', function(e) {
					try {
						myDropzone.destroy();
					} catch(e) {}
			   });
			
			} catch(e) {
			  alert('Dropzone.js does not support older browsers!');
			}
			
			});

        </script>
@endsection