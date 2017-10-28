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
                <a href="#">Dashboard</a>
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

    <input type="hidden" value="{{$polizas}}" id="polizas"/>
    <input type="hidden" value="{{$balanzas}}" id="balanzas"/>
    <!-- TODO -->

    <table width="100%">
        <tr>
            <td width="33%">
                <div class="infobox infobox-blue2" style="width: 350px;height: 100px;">
                    <div class="infobox-progress" style="width: 80px;display: table-cell;">
                        <div class="easy-pie-chart percentage" data-percent="{{$comp_percent}}" data-size="80">
                            <span class="percent">{{$comp_percent}}</span>%
                        </div>
                    </div>

                    <div class="infobox-data" style="padding-left: 30px;display: table-cell;">
                        <span class="infobox-text">Comprobantes no contabilizados:</span>

                        <div class="infobox-content">
                            {{$comp_contblz_count}}
                        </div>
                    </div>
                </div>
            </td>

            <td width="33%">
                <div class="infobox infobox-blue2" style="width: 350px;height: 100px;">
                    <div class="infobox-progress" style="width: 80px;display: table-cell;">
                        <div class="easy-pie-chart percentage" data-percent="{{$polz_sin_reclsif_imp_percent}}" data-size="80">
                            <span class="percent">{{$polz_sin_reclsif_imp_percent}}</span>%
                        </div>
                    </div>

                    <div class="infobox-data" style="padding-left: 30px;display: table-cell;">
                        <span class="infobox-text">Pólizas sin reclasificar impuestos:</span>

                        <div class="infobox-content">
                            {{$polz_sin_reclsif_imp_count}}
                        </div>
                    </div>
                </div>
            </td>

            <td width="33%">
                <div class="infobox infobox-blue2" style="width: 350px;height: 100px;">
                    <div class="infobox-progress" style="width: 80px;display: table-cell;">
                        <div class="easy-pie-chart percentage" data-percent="{{$polz_defecto_percent}}" data-size="80">
                            <span class="percent">{{$polz_defecto_percent}}</span>%
                        </div>
                    </div>

                    <div class="infobox-data" style="padding-left: 30px;display: table-cell;">
                        <span class="infobox-text">Pólizas contabilizadas con cuentas por defecto</span>

                        <div class="infobox-content">
                            {{$polz_defecto_count}}
                        </div>
                    </div>
                </div>
            </td>

        </tr>
    </table>

    <table width="100%" cellpadding="10">
        <tr>
            <!--<td width="50%" valign="top">
                <h1>Pólizas</h1>
                <div class="form-group">
                    <div id="polizaLista"></div>
                </div>
            </td>-->
            <td width="100%" valign="top">
                <h1>Balanza</h1>
                <div class="form-group" style="background-color: #fff; color: #666666; padding-left: 10px; padding-right: 5px; padding-top: 0px; padding-bottom: 5px;">
                    <div id="balanzaLista"></div>
                </div>
            </td>
        <!--</tr>
        <tr>-->
            
        </tr>
    </table>

    </div>
@endsection

@section('app_js')
        @parent
        <script src="{{ asset('DevExtreme/Sources/Lib/js/dx.all.js') }}"></script>
        <!-- ace scripts -->
        <script src="{{ asset('ac_theme/assets/js/jquery.easypiechart.min.js') }}"></script>
        <script src="{{ asset('ac_theme/assets/js/ace-elements.min.js') }}"></script>
        <script src="{{ asset('ac_theme/assets/js/ace.min.js') }}"></script>
        <script type="text/javascript">
            /* Marcando el menú seleccionado */
                $.each(document.getElementById("menus").getElementsByTagName("li"), function( index, value ) {
                  value.classList.remove("active");
                });
                $("#menuinicio").addClass('active');

                $('.easy-pie-chart.percentage').each(function(){
                    var $box = $(this).closest('.infobox');
                    var barColor = $(this).data('color') || (!$box.hasClass('infobox-dark') ? $box.css('color') : 'rgba(255,255,255,0.95)');
                    var trackColor = barColor == 'rgba(255,255,255,0.95)' ? 'rgba(255,255,255,0.25)' : '#E2E2E2';
                    var size = parseInt($(this).data('size')) || 50;
                    $(this).easyPieChart({
                        barColor: barColor,
                        trackColor: trackColor,
                        scaleColor: false,
                        lineCap: 'butt',
                        lineWidth: parseInt(size/10),
                        animate: ace.vars['old_ie'] ? false : 1000,
                        size: size
                    });
                });

                /* DataGrid */
                $(function(){

                    var data = jQuery.parseJSON(document.getElementById('polizas').value);

                    var dataGrid = $("#polizaLista").dxDataGrid({
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
                                dataField: "polz_period_id",
                                caption: 'Período',
                                groupIndex: 0
                            },
                            {
                                dataField: "polz_concepto",
                                caption: 'Concepto'
                            },
                            {
                                dataField: "polz_tipopolz",
                                caption: 'Tipo'
                            },
                            {
                                dataField: "polz_fecha",
                                caption: 'Fecha'
                            },
                            {
                                dataField: "polz_folio",
                                caption: 'Folio'
                            },
                            {
                                dataField: "polz_importe",
                                caption: 'Importe'
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
                                column: "polz_importe",
                                summaryType: "sum",
                                valueFormat: "currency",
                                displayFormat: "Total: {0}",
                                showInGroupFooter: true
                            }]
                        }
                    }).dxDataGrid("instance");



                    var data = jQuery.parseJSON(document.getElementById('balanzas').value);

                    var dataGrid = $("#balanzaLista").dxDataGrid({
                        dataSource: data,
                        allowColumnReordering: true,
                        selection: {
                            allowSelectAll: false,
                            mode: "none"
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
                                caption: 'Periodo',
                                groupIndex: 0
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
                                displayFormat: "{0}",
                                alignByColumn: true
                            }, {
                                column: "blnza_cargos",
                                summaryType: "sum",
                                valueFormat: "currency",
                                showInGroupFooter: true,
                                displayFormat: "{0}",
                                alignByColumn: true
                            }, {
                                column: "blnza_abonos",
                                summaryType: "sum",
                                valueFormat: "currency",
                                displayFormat: "{0}",
                                showInGroupFooter: true
                            }, {
                                column: "blnza_saldo_final",
                                summaryType: "sum",
                                valueFormat: "currency",
                                displayFormat: "{0}",
                                showInGroupFooter: true
                            }]
                        }
                    }).dxDataGrid("instance");
 
                });

        </script>
@endsection