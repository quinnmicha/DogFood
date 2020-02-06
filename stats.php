<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--Bootstrap-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!--Theme-->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!--Chart.js-->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>
    
    <style>body{background-image:url("images/scratch.jpg");}</style>
    <title>About Dog Food</title>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#">Dog Food Calculator</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calculator.php">Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="stats.php">Our Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
    <form method="post">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h1 class="mt-5">Data</h1>
        <div class="results">
            
            <canvas id="myChart" width="398" height="199" style="display: block; width: 398px; height: 199px;"></canvas>
        </div>
            <?php
        
                include __DIR__ . '/model/model_dogFood.php';
                $dog = getData ();

            ?>
            

            <table class="table table-secondary table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Cups a Day</th>
                        <th>Avg Price/Cup</th>
                        <th>Yearly Cost</th>
                    </tr>
                </thead>
                <tbody>


                <?php foreach ($dog as $row): ?>
                    <?php $cupPrice = $row['priceOfBag'] / ($row['cupsInBag']/$row['cupsADay']); ?>
                    <tr>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['cupsADay']; ?></td>
                        <td><?php echo "$" . number_format($cupPrice, 2); ?></td>
                        <td><?php echo "$" . number_format($row['yearPrice'],2); ?></td>            
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
          </div>
        </div><!--/.row-->
        <script>
                function displayChart () {
                   $.get ("chart.php", function (data) {
                       dogData = $.parseJSON(data);
                        //votes = $.parseJSON(votes);
                        var name=[];
                        var cost=[];
                        for(i in dogData[0]){
                            name.push(dogData[0][i]);
                        }
                        for(i in dogData[1]){
                            cost.push(dogData[1][i]);
                        }

                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                              labels: name,
                              datasets: [
                                {
                                  label: "Yearly Cost",
                                  data: cost,
                                  backgroundColor: "#3e95cd",

                                  borderWidth: 10
                                }
                              ]
                            },
                            options: {
                              legend: { display: false },
                              title: {
                                display: false,
                                text: 'Number of Votes By Disney Character'
                              },
                              scales: {
                                    yAxes: [{
                                        ticks: {
                                            beginAtZero:true
                                        }
                                    }]
                                }
                            }
                        });
                    });
                }
                $(document).ready (function () {
                    displayChart ();
                });
            </script>
        
        
        </div><!--/.container-->
        <div style="margin-top:110px;"></div>
    <footer class="fixed-bottom bg-light">
            <div class="text-right" style="margin-right:2%;">
                <p id="date"><?php
                $file = "index.php";
                $mod_date=date("F d Y h:i:s A", filemtime($file));

                echo "Last modified $mod_date";
                ?></p>
            </div>
            <div class="text-center">
                <p>&copy; Michael Quinn 2019</p>
            </div>
            
        </footer>
</body>
</html>