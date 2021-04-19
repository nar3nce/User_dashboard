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
        
        
        <div class="jumbotron  mt-0 mb-0">
<?php
        $error = $this->session->flashdata('register_error');
        if(isset($error)){
?>
        <div class="alert alert-danger alert-dismissible fade show container text-center col-lg-4" role="alert">
            <?=$this->session->flashdata('register_error');?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
        </div>
<?php    
        }
?>
            <div class="container mt-5 mb-5 text-center col-lg-3">
                <form class="" action="<?=base_url();?>process_register" method="post">
                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                    <div class="form-group">
                        <label for="my-input">Email address : </label>
                        <input id="my-input" class="form-control" type="email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="my-input">Full name : </label>
                        <input id="my-input" class="form-control" type="text" name="fullname">
                    </div>
                    <div class="form-group">
                        <label for="my-input">Password : </label>
                        <input id="my-input" class="form-control" type="password" name="password">
                    </div>
                    <div class="form-group">
                        <label for="my-input">Confirm Password : </label>
                        <input id="my-input" class="form-control" type="password" name="confirm_password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </form>
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