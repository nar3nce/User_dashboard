<nav class="navbar navbar-expand-lg color1 text-uppercase navbar-dark">
            <div class="container">
<?php
                $user = $this->session->userdata('user');
                foreach($user as $user_)
                {
?>
                <a class="navbar-brand" href="#page-top"><?= $user_['fullname']; ?></a>
<?php
                }
?>
                <button class="navbar-toggler" data-target="#my-nav" data-toggle="collapse" aria-controls="my-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link" href="<?=base_url();?>user">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?=base_url();?>user/edit_profile">profile</a>
      </li>
      
    </ul>
                <div id="my-nav" class="collapse navbar-collapse">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item mr-3 active"><a class="nav-link py-3" href="<?=base_url();?>user/logout">Sign out</a></li>
                    </ul>
                </div>
            </div>
        </nav>