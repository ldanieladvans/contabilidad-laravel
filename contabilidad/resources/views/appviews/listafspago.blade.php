@extends('templates.layout')

@section('app_css')
	@parent
    <!--<link rel="stylesheet" type="text/css" href="{{ asset('DevExtreme/Sources/Lib/css/dx.spa.css') }}" />-->
    <link rel="stylesheet" type="text/css" href="{{ asset('DevExtreme/Sources/Lib/css/dx.common.css') }}" />
    <link rel="dx-theme" data-theme="generic.light" href="{{ asset('DevExtreme/Sources/Lib/css/dx.light.css') }}" />
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
	            <a href="#">Lista de Formas de Pago</a>
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
		<div id="crearfpago"></div>
		<!-- Input para guardar datos del grid -->
			<input type="hidden" value="{{$fspago}}" id="fspago"/>
		
		<!-- Div contenedor de las acciones -->
			<div id="listaContainer">
				<div id="borrarLista" align="justify"></div>
				<div id="editarLista" align="justify"></div>
			</div>
		
		<!-- Div DataGrid -->
		<div id="fpagoLista"></div>
	</div>
@endsection

@section('app_js')
        @parent
        <script src="{{ asset('DevExtreme/Sources/Lib/js/dx.all.js') }}"></script>
        <!-- ace scripts -->
        <script src="{{ asset('ac_theme/assets/js/ace-elements.min.js') }}"></script>
        <script src="{{ asset('ac_theme/assets/js/ace.min.js') }}"></script>
        <script type="text/javascript">
        	/* Marcando el menú seleccionado */
	        	$.each(document.getElementById("menus").getElementsByTagName("li"), function( index, value ) {
				  value.classList.remove("active");
				});
	        	$("#menuformapago").addClass('active');
	        	$("#menucontabilidad").addClass('open');

        	/* DataGrid */
	        	$(function(){

					var data = jQuery.parseJSON(document.getElementById('fspago').value);

				    var dataGrid = $("#fpagoLista").dxDataGrid({
				        dataSource: data,
				        allowColumnReordering: true,
				        selection: {
				            mode: "multiple"
				        },
				        grouping: {
				            autoExpandAll: true,
				        },
				        filterRow: {
				            visible: true,
				            applyFilter: "auto"
				        },
				        searchPanel: {
				            visible: true,
				            width: 240,
				            placeholder: "Buscar..."
				        },
				        headerFilter: {
				            visible: true
				        },
				        pager:{
				        	showPageSizeSelector: true,
            				allowedPageSizes: [10,20,50,100]
				        },
				        paging: {
				            pageSize: 10
				        },  
				        groupPanel: {
				            visible: true,
				            allowColumnDragging: true,
				            emptyPanelText: "Arrastre aquí para agrupar"
				        },
				        noDataText: 'Sin datos',
				        columns: [
				            {
				                dataField: "formpago_formpagosat_nom",
				                caption: 'Nombre'
				            },
				            {
				                dataField: "formpago_formpagosat_cod",
				                caption: 'Código'
				            },
				            {
				                dataField: "formpago_ctacont_id",
				                caption: 'Cuenta'
				            }
				        ],
				        onSelectionChanged: function(selectedItems) {
				            var data = selectedItems.selectedRowsData;
				            deleteButton.option("disabled", !data.length);
				            editButton.option("disabled", data.length!=1);
				        },
				        sortByGroupSummaryInfo: [{
				            summaryItem: "count"
				        }],
				        summary: {
				            groupItems: [{
				                column: "CompanyName",
				                summaryType: "count",
				                displayFormat: "{0}",
				            }/*, {
				                column: "SaleAmount",
				                summaryType: "max",
				                valueFormat: "currency",
				                showInGroupFooter: false,
				                alignByColumn: true
				            }, {
				                column: "TotalAmount",
				                summaryType: "max",
				                valueFormat: "currency",
				                showInGroupFooter: false,
				                alignByColumn: true
				            }, {
				                column: "TotalAmount",
				                summaryType: "sum",
				                valueFormat: "currency",
				                displayFormat: "Total: {0}",
				                showInGroupFooter: true
				            }*/]
				        }
				    }).dxDataGrid("instance");


				    /* Botón de creación */
				    $("#crearfpago").dxButton({
				        text: "Crear",
				        type: "default",
				        onClick: function(e) { 
				        	//DevExpress.ui.notify("The Apply button was clicked");
				        	window.location.href = window.location.href + '/create';
				        }
				    });


				    /* Botones de opciones */
				    var deleteButton = $("#borrarLista").dxButton({
				        text: "Eliminar",
				        disabled: true,
				        icon: 'trash',
				        onClick: function () {
				        	var del_list = [];
				            //dataGrid.clearSelection();
				            //console.log(dataGrid.getSelectedRowKeys());
				            dataGrid.getSelectedRowKeys().forEach(function(item){
		                        del_list.push(item['ID']);
		                    });
				            bootbox.confirm("¿Está seguro que quiere eliminar estos registros?", function(result) {
								if(result) {
									$('#loadingmodal').modal('show');
						    		$.ajax({
						                url: '/delItems',
					                	type: 'POST',
					                	data: {_token: CSRF_TOKEN,ids:del_list,model:'FormaPago'},
						                dataType: 'JSON',
						                success: function (data) {
					                	    $('#loadingmodal').modal('hide');
					                	    window.location.href = window.location.href;
						                },
						                error: function(XMLHttpRequest, textStatus, errorThrown) { 
						                    console.log(errorThrown);
					                    }
						            });
								}
							});
				        }
				    }).dxButton("instance");

				    var editButton = $("#editarLista").dxButton({
				        text: "Editar",
				        disabled: true,
				        icon: 'edit',
				        onClick: function () {
				            window.location.href = 'fspago/'+dataGrid.getSelectedRowKeys()[0]['ID']+'/edit';
				        }
				    }).dxButton("instance");  
				});
        </script>
@endsection