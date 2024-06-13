@extends('layouts.admindashboard')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
<style>

a {
            text-decoration: none;
        }



.card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-10px);
        }

        .card-body {
            display: flex;
            align-items: center;
        }

        .card-icon {
            font-size: 3rem;
            margin-right: 20px;
            color: #007bff;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

.card-text {
            font-size: 1.25rem;
            color: #6c757d;
        }

        .card-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            width: 100%;
            padding-top: 1rem;
        }

        .card-wrapper {
            flex: 1;
            margin: 20px;
            max-width: 400px;
        }

</style>

<body id="body-pd">

<div class="height-100">
        <div class="card-container">
            <!-- Card for Patients -->
            <div class="card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="fas fa-user-injured"  style="color: #79E394;"></i>
                        </div>
                        <div>
                            <h5 class="card-title">Total Patients</h5>
                            <p class="card-text">{{ $totalPatients }}</p>
                        </div>
                    </div>
                </div>
            </div>
<!-- Card for Doctors -->
<div class="card-wrapper">
                <div class="card">
                    <div class="card-body">
                        <div class="card-icon">
                            <i class="fas fa-user-md"></i>
                        </div>
                        <div>
                            <h5 class="card-title">Total Medecins</h5>
                            <p class="card-text">{{ $totalMedecins }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>            <div id="apexcharts-doughnut"></div>       



        <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            const showNavbar = (toggleId, navId, bodyId, headerId) => {
                const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId);

                if (toggle && nav && bodypd && headerpd) {
                    toggle.addEventListener('click', () => {
                        nav.classList.toggle('show');
                        toggle.classList.toggle('bx-x');
                        bodypd.classList.toggle('body-pd');
                        headerpd.classList.toggle('body-pd');
                    });
                }
            };
            showNavbar('header-toggle', 'nav-bar', 'body-pd', 'header');

const linkColor = document.querySelectorAll('.nav_link');

function colorLink() {
    if (linkColor) {
        linkColor.forEach(l => l.classList.remove('active'));
        this.classList.add('active');
    }
}

linkColor.forEach(l => l.addEventListener('click', colorLink));
});
</script>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>
document.addEventListener("DOMContentLoaded", function() {
    var options = {
      chart: {
        height: 350,
        type: "donut",
      },
      dataLabels: {
        enabled: false
      },
      labels: ['Médecins','Patients' ], 
      series: [ <?php echo $totalMedecins;?>,<?php echo $totalPatients;?>]
    };
    var chart = new ApexCharts(document.querySelector("#apexcharts-doughnut"), options);
    chart.render();
});
</script>
</body>

</html>





@endsection