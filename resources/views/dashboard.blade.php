@extends('layout')

@section('content')
<div class="container">
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-primary">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-users"></i> Utilisateurs</h5>
                    <p class="card-text">{{ $userCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-user-graduate"></i> Étudiants</h5>
                    <p class="card-text">{{ $studentCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-stream"></i> Filières</h5>
                    <p class="card-text">{{ $filiereCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-book-open"></i> Cours</h5>
                    <p class="card-text">{{ $courseCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-pencil-alt"></i> Examens</h5>
                    <p class="card-text">{{ $examCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card text-white bg-secondary">
                <div class="card-body">
                    <h5 class="card-title"><i class="fas fa-chart-line"></i> Résultats</h5>
                    <p class="card-text">{{ $resultCount }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-4">
            <canvas id="userChart"></canvas>
        </div>
        <div class="col-md-6 mb-4">
            <canvas id="studentChart"></canvas>
        </div>
        <div class="col-md-6 mb-4">
            <canvas id="lineChart"></canvas>
        </div>
        <div class="col-md-6 mb-4">
            <canvas id="radarChart"></canvas>
        </div>
        <div class="col-md-6 mb-4">
            <canvas id="doughnutChart"></canvas>
        </div>
    </div>
</div>

<script>
    const userCtx = document.getElementById('userChart').getContext('2d');
    const userChart = new Chart(userCtx, {
        type: 'bar',
        data: {
            labels: ['Utilisateurs', 'Étudiants', 'Filières', 'Cours', 'Examens', 'Résultats'],
            datasets: [{
                label: '# de comptes',
                data: [{{ $userCount }}, {{ $studentCount }}, {{ $filiereCount }}, {{ $courseCount }}, {{ $examCount }}, {{ $resultCount }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
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

    const studentCtx = document.getElementById('studentChart').getContext('2d');
    const studentChart = new Chart(studentCtx, {
        type: 'pie',
        data: {
            labels: ['Utilisateurs', 'Étudiants', 'Filières', 'Cours', 'Examens', 'Résultats'],
            datasets: [{
                label: '# de comptes',
                data: [{{ $userCount }}, {{ $studentCount }}, {{ $filiereCount }}, {{ $courseCount }}, {{ $examCount }}, {{ $resultCount }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(201, 203, 207, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                borderWidth: 1
            }]
        }
    });

    const lineCtx = document.getElementById('lineChart').getContext('2d');
    const lineChart = new Chart(lineCtx, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            datasets: [{
                label: 'Utilisateurs',
                data: [10, 20, 30, 40, 50, 60, 70, 80, 90, 100, 110, 120],
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
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

    const radarCtx = document.getElementById('radarChart').getContext('2d');
    const radarChart = new Chart(radarCtx, {
        type: 'radar',
        data: {
            labels: ['Utilisateurs', 'Étudiants', 'Filières', 'Cours', 'Examens', 'Résultats'],
            datasets: [{
                label: 'Statistiques',
                data: [{{ $userCount }}, {{ $studentCount }}, {{ $filiereCount }}, {{ $courseCount }}, {{ $examCount }}, {{ $resultCount }}],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                r: {
                    beginAtZero: true
                }
            }
        }
    });

    const doughnutCtx = document.getElementById('doughnutChart').getContext('2d');
    const doughnutChart = new Chart(doughnutCtx, {
        type: 'doughnut',
        data: {
            labels: ['Utilisateurs', 'Étudiants', 'Filières', 'Cours', 'Examens', 'Résultats'],
            datasets: [{
                label: 'Statistiques',
                data: [{{ $userCount }}, {{ $studentCount }}, {{ $filiereCount }}, {{ $courseCount }}, {{ $examCount }}, {{ $resultCount }}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
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
</script>
@endsection



