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
    <style>body{background-image:url("images/scratch.jpg");}</style>
    <script src="dogFood.js"></script>
    <title>DogFood</title>
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
                        <a class="nav-link active" href="calculator.php">Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stats.php">Our Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <form method="post">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h1 class="mt-5">Dog Food Calculator</h1>
                <p class="lead">This calculator will let you know how long your dog food will last!</p>
              </div>
            </div><!--/.row-->
            <div style="width:60%; margin:auto; margin-top:2%; background-color:RGB(212, 212, 212); box-shadow:5px 10px; padding-left:5%; padding-right:5%; padding-top:1%;padding-bottom:1%;">
                <div style="margin-left:auto;">
                    
                    <div class="form-row text-center">
                        <h6>What is your dog's name?</h6>
                    </div>
                    <div class="form-row" style="margin-bottom:2%;">
                        <input name="dogName" id="dogName" class="form-control" placeholder="ex. 'Spot Smith'" Width="100px">
                    </div><!--/foodcost-->
                    <div class="form-row text-center">
                        <h6>How many cups does your dog eat a day?</h6>
                    </div>

                    <div class="form-row" style="margin-bottom:2%;">
                        <input name="foodAmt" id="foodAmt" class="form-control" placeholder="ex. '4'" Width="100px">

                    </div><!--/foodAmt-->
                    <div class="form-row text-center">
                        <h6>How much does one bag of dog food cost?</h6>
                    </div>
                    <div class="form-row" style="margin-bottom:2%;">
                        <input name="foodCost" id="foodCost" class="form-control" placeholder="ex. '48.37'" Width="100px">
                    </div><!--/foodcost-->

                    <div class="form-row text-center">
                        <h6>How many pounds does that bag contain?</h6>
                    </div>
                    <div class="form-row" style="margin-bottom:2%;">
                        <input id="foodPounds" class="form-control" placeholder="ex. '30'" name="foodPounds" Width="100px">

                    </div><!--/foodPounds-->
                    <div class="form-row" style="margin-bottom:2%;">
                        <button type="submit" onclick="return checkData()" name="submit" class="btn btn-light">Submit</button>
                    </div>
                </div><!--/inside grey box-->
            </div><!--/grey box-->
            <div class='form-row' style='width:60%; margin:auto; margin-top:3%; padding-left:2%;'>

                <?php
                include __DIR__ . '/model/model_dogFood.php';
                    if (isset ($_POST['submit'])) 
                    {
                        $name = $_POST['dogName'];
                        $foodAmt = $_POST['foodAmt'];
                        $foodCost = $_POST['foodCost'];
                        $foodPound = $_POST['foodPounds'];
                        $day= 0 ;//The Current Month
                        $loopCheck = true;
                        $foodPound=$foodPound*4;
                        $foodPoundCups= $foodPound;
                        if($foodAmt>0&&$foodCost>0&&$foodPound>0){

                            while($foodPound>=$foodAmt){
                                $foodPound-=$foodAmt;
                                $day++; 
                            }

                            $costPerDay = $foodCost/$day;
                            $foodYr=355/$day;
                            $foodCostYr = $foodYr * $foodCost;
                            if($loopCheck == true){
                                echo "<div class=\"col\">";
                                echo "<h4>Summary</h4>";
                                echo "<h6>Total Days: " . $day ."</h6>";
                                echo "<h6>Cost Per Day: $" . number_format($costPerDay, 2) ."</h6>";
                                echo"<h6>Food Left Over: ". $foodPound ." Cups</h6>";
                                echo "</div>";
                                echo "<div class=\"col\">";
                                echo"<h4>Year Summary</h4>";
                                echo "<h6>Bags Needed: ". number_format($foodYr, 2) ."</h6>";
                                echo "<h6>Cost: $". number_format($foodCostYr, 2) ."</h6>";
                                echo "</div>";
                                echo "<button type=\"button\" class=\"btn btn-dark\"><a href=\"stats.php\">Compare To Others</a></button>";

                            }
                            else{
                                echo "<h4>You will never be able to pay this debt off with your current monthly payment</h4>";
                            }

                        }
                        $result = addData($name, $foodAmt, $foodPoundCups, $foodCost, $foodCostYr);

                    }
                ?>
        
        </div>
        
    </form>
        
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
