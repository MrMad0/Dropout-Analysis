<!-- Act as Web Developer, I have an project of the Dropout Analysis with php and MySQL database 
-where there are 2 entity (Ministry,School) that entitties has its own login page where they login.
-ministry dashboard 1st div : it show the 3 dropdown (years,reason,district) and "Apply" button.
-click on the apply button the 2nd div :the result shows in the Graphs and Charts.
-3rd div shows the result in table format(Sr No,School Name,No of dropout student, -->
<?php
session_start();
if (!isset($_SESSION['ministry_email'])) {
    header("Location: Ministry_login_1.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css">
    <title>Dropout Report</title>
</head>
<body>
    <div class="container">
        <!-- First Div: Title -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Dropout Report</a>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Second Div: Dropdowns and Apply Button -->
        <div class="mt-4">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <select class="form-select">
                        <option>Select City</option>
                        <option>Surat</option>
                        <option>Vadodara</option>
                     
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option>Select Year</option>
                        <option>2022</option>
                        <option>2023</option>
                     
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select">
                        <option>Select Reason</option>
                        <option>Financial Issues</option>
                        <option>Health Issues</option>
                   
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="button" class="btn btn-primary">Apply</button>
                </div>
            </div>
        </div>
        <!-- Third Div: Charts and Graphs -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <canvas id="myChart1" width="400" height="400"></canvas>
            </div>
            <div class="col-md-6">
                <canvas id="myChart2" width="400" height="400"></canvas>
            </div>
        </div>
    </div>
        <!-- Fourth Div: Table -->
        <div class="mt-4">
            <table class="table">
                <thead>
                    <tr>
                        <th>Reason of Dropout</th>
                        <th>No. of Dropout Students</th>
                        <th>District</th>
                        <th>Year</th>
                        <th>No of School</th>
                        <th>More Info</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Health Issues</td>
                        <td>20</td>
                        <td>Surat</td>
                        <td>2023</td>
                        <td>5</td>
                        <td><a href="#">More Info</a></td>
                    </tr>
                    <tr>
                        <td>Financial Issues</td>
                        <td>20</td>
                        <td>Surat</td>
                        <td>2023</td>
                        <td>5</td>
                        <td><a href="#">More Info</a></td>
                    </tr>
                    
                    <tr>
                        <td>Health Issues</td>
                        <td>10</td>
                        <td>Vadodara</td>
                        <td>2022</td>
                        <td>2</td>
                        <td><a href="#">More Info</a></td>
                    </tr>
                    <tr>
                        <td>Financial Issues</td>
                        <td>30</td>
                        <td>Vadodara</td>
                        <td>2023</td>
                        <td>2</td>
                        <td><a href="#">More Info</a></td>
                    </tr>             
                </tbody>
            </table>
        </div>
    </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>

    <script>
        var ctx = document.getElementById('myChart1').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
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
    <script>
        var ctx = document.getElementById('myChart2').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3],
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
</body>
</html>
