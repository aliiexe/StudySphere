@extends('layouts.master')
@section('content')
<div class="container">
<h1 class="my-4">Charts</h1>
    <div style="width: 100%; max-width: 800px; margin: auto;">
        <canvas id="myChart" width="400" height="400"></canvas>
    </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Hommes', 'Femmes'],
                datasets: [{
                    data: [{{ $maleCount }}, {{ $femaleCount }}],
                    backgroundColor: ['gray', 'pink'],
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
@endsection
