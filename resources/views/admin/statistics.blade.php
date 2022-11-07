@extends('layouts.app')

@section('extra-js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-9 m-auto">
            <canvas id="myChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>

<script>

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

  const montSells = {!! json_encode($month_sells) !!};
  const yearSells = {!! json_encode($year_sells) !!};

  const data = {
    labels: labels,
    datasets: [{
      label: 'Fatturato mensile (€)',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: montSells,
    },
    {
      label: 'Fatturato annuo (€)',
      backgroundColor: 'rgb(100, 99, 132)',
      borderColor: 'rgb(100, 99, 132)',
      data: yearSells,
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };

const myChart = new Chart(
    document.getElementById('myChart'),
    config
);

</script>
@endsection