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
	            <a href="#">Balanza de Comprobación</a>
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
		<!--<div id="crearpoliza"></div>-->
		<!-- Input para guardar datos del grid -->
			<input type="hidden" value="{{$balanzas}}" id="balanzas"/>
		
		<!-- Div contenedor de las acciones -->
			<!--<div id="listaContainer">
				<div id="borrarLista" align="justify"></div>
				<div id="editarLista" align="justify"></div>
			</div>-->
		
		<!-- Div DataGrid -->
		<div id="balanzaLista"></div>
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
	        	$("#menubalanza").addClass('active');
	        	$("#menucontabilidad").addClass('open');

        	/* DataGrid */
	        	$(function(){

					var data = jQuery.parseJSON(document.getElementById('balanzas').value);

				    var dataGrid = $("#balanzaLista").dxDataGrid({
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
				                dataField: "blnza_ctacont_id",
				                caption: 'Cuenta'
				            },
				            {
				                dataField: "blnza_period_id",
				                caption: 'Periodo'
				            },
				            {
				                dataField: "blnza_saldo_inicial",
				                caption: 'Saldo Inicial'
				            },
				            {
				                dataField: "blnza_cargos",
				                caption: 'Cargos'
				            },
				            {
				                dataField: "blnza_abonos",
				                caption: 'Abonos'
				            },
				            {
				                dataField: "blnza_saldo_final",
				                caption: 'Saldo Final'
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
				                column: "blnza_ctacont_id",
				                summaryType: "count",
				                displayFormat: "{0}",
				            }, {
				                column: "blnza_saldo_inicial",
				                summaryType: "sum",
				                valueFormat: "currency",
				                showInGroupFooter: true,
				                alignByColumn: true
				            }, {
				                column: "blnza_cargos",
				                summaryType: "sum",
				                valueFormat: "currency",
				                showInGroupFooter: true,
				                alignByColumn: true
				            }, {
				                column: "blnza_abonos",
				                summaryType: "sum",
				                valueFormat: "currency",
				                displayFormat: "Total: {0}",
				                showInGroupFooter: true
				            }, {
				                column: "blnza_saldo_final",
				                summaryType: "sum",
				                valueFormat: "currency",
				                displayFormat: "Total: {0}",
				                showInGroupFooter: true
				            }]
				        }
				    }).dxDataGrid("instance");




				    
				});
        </script>
@endsection