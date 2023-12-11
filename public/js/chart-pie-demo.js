// Dans votre fichier JavaScript
document.addEventListener('DOMContentLoaded', function () {
    // Récupérez les données du graphique depuis votre route Laravel
    fetch('/statistiques/utilisateurs')
        .then(response => response.json())
        .then(data => {
            // Configurez le graphique en secteurs (pie)
            var ctxPie = document.getElementById('myPieChart').getContext('2d');
            var myPieChart = new Chart(ctxPie, {
                type: 'pie',
                data: {
                    labels: data.map(entry => entry.date),
                    datasets: [{
                        label: 'Nombre d\'utilisateurs inscrits par jour',
                        data: data.map(entry => entry.count),
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)',
                            'rgba(54, 162, 235, 0.7)',
                            'rgba(255, 206, 86, 0.7)',
                            'rgba(75, 192, 192, 0.7)',
                            'rgba(153, 102, 255, 0.7)',
                            'rgba(255, 159, 64, 0.7)'
                        ],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                }
            });
        });
});
