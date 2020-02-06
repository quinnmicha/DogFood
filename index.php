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
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="calculator.php">Calculator</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="stats.php">Our Data</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <img class="embed-responsive" src="images/dogFood.jpg" />
    <div class="container bg-light rounded" style="margin-top:3%;box-shadow:5px 10px;">
        <div class="row" style="padding:2%;">
          <div class="col-lg-12">
            <h1 class="mt-5">About This Program</h1>
            <p class="lead text-align">This program gives a dog owner a real view into the cost of dog food. This program also allows the user to compare their expenses to other users.</p>
            <p class="lead text-align">This program was originally created in Windows Forms using Microsoft Visual Studio 2017, and written in C#. Converted for practice into a web application.</p>
            <p class="lead text-align">The front-end of this site is written in HTML5, utilizing BootStrap 4, for responsive CSS/JavaScript. Validations are executed through custom JavaScript before moving to the back-end. The back-end of this program is written in PHP where it connects to a database created using MySQL.</p>
            <p class="lead text-aling">A link to my other projects <a href="http://mikequinn.codes">MikeQuinn.Codes</a></p>
            <h2 class="int-5">Privacy</h2>
            <p class="lead text-aling">This program is created for educational use. Therefore all data submitted will be open and able to be viewed at any given time. By providing your information, you agree to the the statements provided.</p>
          </div>
        </div><!--/.row-->
        
        
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