@extends('layouts.app')

@section('extra-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-lg-8 m-auto">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>

<script>

  const montSells = {!! json_encode($month_sells) !!};
  const yearSells = {!! json_encode($year_sells) !!};
  
  const labels = [
    'Gennaio',
    'Febbraio',
    'Marzo',
    'Aprile',
    'Maggio',
    'Giugno',
    'Luglio',
    'Agosto',
    'Settembre',
    'Ottobre',
    'Novembre',
    'Dicembre',
  ];

const data = {
  labels: labels,
  datasets: [
    {
      label: 'Fatturato mensile (€)',
      data: montSells,
      backgroundColor: '#B1291B',
      borderColor: '#B1291B',
      type: 'bar'
    },
    {
      label: 'Fatturato annuale (€)',
      data: yearSells,
      backgroundColor: 'rgb(100, 99, 132)',
      borderColor: 'rgb(100, 99, 132)',
    }
  ]
};

const config = {
  type: 'line',
  data: data,
  options: {
    plugins: {
      title: {
        display: false,
        text: 'Chart.js Stacked Line/Bar Chart'
      }
    },
    scales: {
      y: {
        stacked: true
      }
    }
  },
};

const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );

</script>
@endsection