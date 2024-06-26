@extends('layouts.master')

@section('content')
<div class="container">
    <h1 >Bienvenue à l'admin panel</h1>

    <!-- Display the user registration chart -->
    <div style="width: 100%; max-width: 800px; margin: auto;">
        <canvas id="userRegistrationChart"></canvas>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('userRegistrationChart').getContext('2d');

    fetch('/chart/getUsersRegistrationData')
        .then(response => response.json())
        .then(data => {
            var userRegistrationChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.map(entry => entry.date),
                    datasets: [{
                        label: 'User Registrations',
                        data: data.map(entry => entry.count),
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });
</script>
@endsection
