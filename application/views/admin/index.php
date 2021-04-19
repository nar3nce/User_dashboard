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

        <div class="jumbotron color mt-0 mb-0">
            <div class="container mb-5 text-center col-lg-11">
            <h2 class="text-left mb-4">Manage Users</h2>
                <table class="table color2">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Full Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Created_at</th>
                            <th scope="col">Userlevel</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
                        foreach($users as $users_){
                            $date = date_create($users_['created_at']);
?>
                        <tr>
                            <th scope="row"><?= $users_['id']; ?></th>
                            <td><?= $users_['fullname']; ?></td>
                            <td><?= $users_['email']; ?></td>
                            <td><?= date_format($date,"F j, Y H:i:s A"); ?></td>
                            <td><?= $users_['usertype']; ?></td>
                            <td><a class="btn btn-primary" href="<?= base_url(); ?>admin/edit_user/<?= $users_['id']; ?>">EDIT</a> <span class="btn btn-danger" data-toggle="modal" data-target="#user_<?= $users_['id']; ?>">REMOVE</span></td>
                        </tr>
                        <div class="modal fade" id="user_<?= $users_['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete user <span class="text-info"><?= $users_['fullname']; ?></span> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <a class="btn btn-danger" href="<?=base_url();?>admin/delete_user/<?= $users_['id']; ?>">REMOVE</a>
                                </div>
                                </div>
                            </div>
                        </div>
<?php
                        }
?>
                    </tbody>
                </table>
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