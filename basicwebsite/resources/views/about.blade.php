@extends('layouts.app')

@section('content')
<!--  <h1>About</h1>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
-->  <!--@include('inc.graph')-->
  <center><h1>JUMLAH APLIKASI</h1></center>
  <canvas id="pieChart" width =1200 height=1200 style="background-color: #f1f1f1"></canvas>
  <br><br><br><br><br>
  <center><h1>TOTAL DOWN PERTANGGAL</h1></center>
  <canvas id="lineChart" width =400 height=200 style="background-color: #f1f1f1"></canvas>

  <script type="text/javascript">

    //doughnut
    var url = "{{url('about/chartnm')}}";
    var Type = new Array();
    var DateType = new Array();
    var ColorType = new Array();
    var Count = new Array();
    var Exist = new Array();
    $(document).ready(function(){
      $.get(url, function(response){
        response.forEach(function(data){
          Type.push(data.nmserver);
          DateType.push(data.tgldown);
        });

    for(i=0;i<=Type.length-1;i++){
      if(Exist.includes(Type[i]) === true) {
        ind = Exist.indexOf(Type[i]);
        Count[ind]+=1;
      } else {
        ColorType.push(getRandomColor());
        Exist.push(Type[i]);
        Count.push(1);
      }
    }

    //pie
      var ctxP = document.getElementById("pieChart").getContext('2d');
      var myPieChart = new Chart(ctxP, {
        type: 'pie',
        data: {
          labels: Exist,
          datasets: [{
            data: Count,
            backgroundColor: ColorType
          }]
        },
        options: {
          responsive: true
        }
      });

      var CountDay = new Array();
      var ExistDay = new Array();
      var Month = ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"];
      var CountMonth = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
      console.log(CountMonth.length);
      DateType.sort();
      for(i=0;i<=DateType.length-1;i++) {
        dating = DateType[i];
        dating = dating.replace("-","").slice(0,9);
        dating = dating.slice(-2);
        ind = Month.indexOf(dating);
        CountMonth[ind]+=1;

      }

      var ctxL = document.getElementById("lineChart").getContext('2d');
      var myLineChart = new Chart(ctxL, {
        type: 'line',
        data: {
          labels: Month,
          datasets: [{
              label: "down pertanggal",
              data: CountMonth,
              backgroundColor: [
                'rgba(105, 0, 132, .2)',
              ],
              borderColor: [
                'rgba(200, 99, 132, .7)',
              ],
              borderWidth: 2
            }
          ]
        },
        options: {
          responsive: true
        }
      });
    });
  });

  function getRandomColor() {
    var letters = '0123456789ABCDEF';
    var color = '#';
    for (var i = 0; i < 6; i++) {
      color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
  }
  </script>

@endsection

<!--@section('sidebar')
  @parent
  <p>New side bar show</p>
@endsection-->
