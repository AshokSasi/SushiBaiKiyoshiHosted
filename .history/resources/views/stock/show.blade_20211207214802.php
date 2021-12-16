@extends('layouts.master')

@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <script type="text/javascript">

  var fishStock = <?php echo $fishStock; ?>;

    google.charts.load('current', {'packages':['line']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
      var data = google.visualization.arrayToDataTable(fishStock);

      var options = {
        title: 'Historical Prices',
        curveType: 'function',
        legend: {position: 'none'},
        hAxis: {
      title: 'Date'
    },
    vAxis: {
      title: 'Price (CAD)'
    }
      };

      var chart = new google.charts.Line(document.getElementById('linechart_material'));

chart.draw(data, google.charts.Line.convertOptions(options));
      // var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

      // chart.draw(data, options);
    }
  </script>

@section('content')
<h1 class="banner1">{{$stocks->stockDescription}} Stock</h1>
<div class="album py-5 contOpa rounded">  
 <a href="/stock/index"> <button class="btn btn-primary mb-2">Return</button></a>
 
        <table class="table table-hover table-striped table-dark">
            <thead>
              <tr>
                <th style="text-align:center" scope="col">Fish Price</th>
                <th style="text-align:center" scope="col">Year</th>
             
          
              </tr>
            </thead>
            <tbody>
              <div id="curve_chart" style="width: auto; height: 500px"></div>
              @foreach ($stocks->fish as $fish)
              <tr>
              
              <td class="center" >${{number_format((float)$fish->fishPrice,2)}}</td>
              <td class="center" >{{$fish->fishPriceDate}}</td>
             
              </tr>
              @endforeach
           

               
              
            </tbody>
          </table>
       
        @include('layouts.errors')
    </div>

@endsection