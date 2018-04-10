@extends('layouts.admin')

@section('title')

@endsection

@push('styles')
<!-- DataTables -->

<link rel="stylesheet" href="{{ url('plugins/datatables/dataTables.bootstrap.css') }}">
@endpush

@section('content')
    <div class="form-group col-md-12">
        <div class="form-group col-md-6" style="background: #ffffff; height: 300px;">
            <div style="text-align: center;">
                <h2 class="form-group" style ="font-size: 24px;" >@lang('admin/dashboard.now'):</h2>
            </div>
            <div style="text-align: center;">
                <b><h1 id="data-visitors" style ="font-size: 100px;">{{ $activeVisitors }}</h1></b>
            </div>
            <div style="text-align: center;">
                <span class="form-group" style ="font-size: 18px;" >@lang('admin/dashboard.current_user')</span>
            </div>
            <br>
            <div id="real-time-device">
                <div id="device-data" ></div>
            </div>
        </div>
        <div class="form-group col-md-6">
            <div id="pieMap" style="height: 300px;"></div>
        </div>
    </div>

    <div class="form-group col-md-12">
        <div id="chartMap" class="form-group col-md-6"></div>
        <div id="chart_div" class="form-group col-md-6" style="height: 400px;" ></div>
    </div>
 

    <div class="col-md-12">
        <div class="form-group col-md-6">
            <h2>@lang('admin/dashboard.top_post_page')</h2> 
            <table id="table-page" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>@lang('admin/dashboard.title')</th>
                        <th>@lang('admin/dashboard.view')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pages as $key => $page)
                       <tr>
                            <td>{!! str_limit($page['url'] , $limit = 50, $end = '...') !!}</td>
                            <td>{{ $page['pageViews']}}</td>
                       </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="form-group col-md-6">
            <h2>@lang('admin/dashboard.top_traffic_source')</h2> 
            <table id="table-traffics" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>@lang('admin/dashboard.title')</th>
                        <th>@lang('admin/dashboard.view')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($traffics as $key => $traffic)
                        <tr>
                            <td>{!! str_limit($traffic['url'] , $limit = 50, $end = '...') !!}</td>
                            <td>{{ $traffic['pageViews']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
@endsection

@section('scripts')

    <script type="text/javascript">

    	Highcharts.chart('chartMap', {

            chart: {
                type: 'line'
            },
            title: {
                text: '{{ trans("admin/dashboard.visiter") }}'
            },
            xAxis: {
                categories: {!! json_encode($dates->map(function($date) { return $date->format('d/m'); })) !!}
            },
            yAxis: {
                title: {
                    text: '{{ trans("admin/dashboard.amount") }}'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                }
            },
            series: [{
                name: '{{ trans("admin/dashboard.visiter") }}',
                data: {!! json_encode($visitors) !!}
            },{
                name: '{{ trans("admin/dashboard.page_view") }}',
                data: {!! json_encode($pageViews) !!}
            }]

        });
        var data = <?php echo($browserjson) ?>;
        Highcharts.chart('pieMap', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: '{{ trans("admin/dashboard.browser") }}'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: data,
            }]
        });
    </script>

    <script type='text/javascript'>
         google.charts.load('current', {
           'packages': ['geochart'],
           'mapsApiKey': 'AIzaSyD-9tSrke72PouQMnMX-a7eZSW0jkFMBWY'
         });
         var abc = <?php echo($city); ?>;
   
         google.charts.setOnLoadCallback(drawMarkersMap);

          function drawMarkersMap() {
          var data = google.visualization.arrayToDataTable(abc);
          var options = {
            region: 'VN',
            displayMode: 'markers',
            colorAxis: {colors: ['green', 'blue']}
          };

          var chart = new google.visualization.GeoChart(document.getElementById('chart_div'));
          chart.draw(data, options);
        };
    </script>

    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        var data_device = {!! $device !!};
        
        function drawBasic() {
            var data = google.visualization.arrayToDataTable(data_device);
            var colors = [
             { color: '#ed561b' },  //high
             { color: '#50b432' },      //medium
             ];
              var view = new google.visualization.DataView(data);
              view.setColumns([0, 1, 
                               { calc: "stringify",
                                 sourceColumn: 1,
                                 type: "string",
                                 role: "annotation" ,
                                    },
                               2,
                               { calc: "stringify",
                                 sourceColumn: 2,
                                 type: "string",
                                 role: "annotation" }
               ]);
              
              var options = {
                width: 480,
                height: 50,
                legend: { position: 'top', maxLines: 3 },
                bar: { groupWidth: '75%' },
                isStacked: true,
                series: colors,
                hAxis: { textPosition: 'none' },
                vAxis: { textPosition: 'none' },

              };

              var chart = new google.visualization.BarChart(document.getElementById('device-data'));

              chart.draw(view, options);
        }

        function loadData() {
            $.ajax({
                url : '{{ route("admin.dashboard.loadData") }}',
                type : 'GET'
            }).done(function(res) {
                $('#data-visitors').text(res.activeVisitors);
                data_device =  JSON.parse(res.device);
                drawBasic();
            });
        }
        setInterval(function(){ loadData(); }, 15000);
    </script>
@endsection