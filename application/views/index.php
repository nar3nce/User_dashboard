<!doctype html>
<html lang="en">
    <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="My Simple bootstrap design">
    <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">
        <title>Blank page</title>
    </head>
    <body>


        <!-- Navbar -->
        <?php include_once('navbar.php'); ?>
        <div class="jumbotron color2 mt-0 mb-0">
            <div class="container">
                <h1 class="display-4">User Dashboard Assignment</h1>
                <p class="lead">Created by Valencia Nars</p>
                <hr class="my-4">
                <div class="row">
                    <div class="col-lg-4">
                        <h3>MVC</h3>
                        <p>MVC stands for Model, View, and Controller. MVC separates an application into three components - Model, View, and Controller. Model: Model represents the shape of the data. A class in C# is used to describe a model. Model objects store data retrieved from the database.</p>
                    </div>
                    <div class="col-lg-4">
                        <h3>Web Security</h3>
                        <p>Web application security is a branch of information security that deals specifically with security of websites, web applications and web services. At a high level, web application security draws on the principles of application security but applies them specifically to internet and web systems. </p>
                    </div>
                    <div class="col-lg-4">
                        <h3>Code igniter</h3>
                        <p>CodeIgniter is a powerful PHP framework with a very small footprint, built for developers who need a simple and elegant toolkit to create full-featured web applications.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- footer -->
        <?php include_once('footer.php'); ?>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
</html>