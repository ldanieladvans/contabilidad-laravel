@extends('templates.layout')

@section('app_css')
	@parent
    <link rel="stylesheet" type="text/css" href="{{ asset('DevExtreme/Sources/Lib/css/dx.spa.css') }}" />
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
	            <i class="ace-icon fa fa-user home-icon"></i>
	            <a href="#">Lista de Permisos</a>
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
		<!-- Input para guardar datos del grid -->
			<input type="hidden" value="{{$permisos}}" id="permisos"/>
		
		<!-- Div contenedor de las acciones -->
			<div id="listaContainer">
				<div id="editarLista" align="justify"></div>
			</div>
		
		<!-- Div DataGrid -->
		<div id="permisoLista"></div>
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
	        	$("#menupermisos").addClass('active');
	        	$("#menuseguridad").addClass('open');

        	/* DataGrid */
	        	$(function(){

					var data = jQuery.parseJSON(document.getElementById('permisos').value);

				    var dataGrid = $("#permisoLista").dxDataGrid({
				        dataSource: data,
				        allowColumnReordering: true,
				        selection: {
				            mode: "single"
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
				                dataField: "name",
				                caption: 'Nombre'
				            },
				            {
				                dataField: "slug",
				                caption: 'Código'
				            },
				            {
				                dataField: "description",
				                caption: 'Descripción'
				            }
				        ],
				        onSelectionChanged: function(selectedItems) {
				            var data = selectedItems.selectedRowsData;
				            editButton.option("disabled", data.length!=1);
				        },
				        sortByGroupSummaryInfo: [{
				            summaryItem: "count"
				        }],
				        summary: {
				            /*groupItems: [{
				                column: "CompanyName",
				                summaryType: "count",
				                displayFormat: "{0}",
				            }, {
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
				            }]*/
				        }
				    }).dxDataGrid("instance");


				    var editButton = $("#editarLista").dxButton({
				        text: "Editar",
				        disabled: true,
				        icon: 'edit',
				        onClick: function () {
				            window.location.href = 'permisos/'+dataGrid.getSelectedRowKeys()[0]['ID']+'/edit';
				        }
				    }).dxButton("instance");  
				});
        </script>
@endsection