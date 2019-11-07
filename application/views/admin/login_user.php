<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $title ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?= site_url('assets/login/images/icons/favicon.ico')?>"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/login/vendor/bootstrap/css/bootstrap.min.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/login/fonts/iconic/css/material-design-iconic-font.min.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/login/vendor/animate/animate.css')?>">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/login/vendor/css-hamburgers/hamburgers.min.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/login/vendor/animsition/css/animsition.min.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/login/vendor/select2/select2.min.css')?>">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/login/vendor/daterangepicker/daterangepicker.css')?>">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/login/css/util.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= site_url('assets/login/css/main.css')?>">
<!--===============================================================================================-->
</head>
<body>

    
    <div class="container-login100" style="background-image: url('assets/login/images/bg-01.jpg');">

        <div class="wrap-login100 p-l-55 p-r-55 p-t-80 p-b-30">
                <?php if($this->session->flashdata('pesan')== TRUE):?>
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> <?= $this->session->flashdata('pesan') ?>
                    </div>
                <?php endif ?>
                <?php if($this->session->flashdata('logout')== TRUE):?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?= $this->session->flashdata('logout') ?>
                    </div>
                <?php endif ?>
            <form class="login100-form validate-form" action="<?= site_url('User_c/login')?>" method="post">
                <span class="login100-form-title p-b-37">
                    Sign In
                </span>

                <div class="wrap-input100 validate-input m-b-20" data-validate="Enter username or email">
                    <input class="input100" type="text" name="email" placeholder="username or email">
                    <span class="focus-input100"></span>
                </div>

                <div class="wrap-input100 validate-input m-b-25" data-validate = "Enter password">
                    <input class="input100" type="password" name="password" placeholder="password">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                        Sign In
                    </button>
                </div>

            </form>

            
        </div>
    </div>
    
    

    <div id="dropDownSelect1"></div>
    
<!--===============================================================================================-->
    <script src="<?= site_url('assets/login/vendor/jquery/jquery-3.2.1.min.js')?>"></script>
<!--===============================================================================================-->
    <script src="<?= site_url('assets/login/vendor/animsition/js/animsition.min.js')?>"></script>
<!--===============================================================================================-->
    <script src="<?= site_url('assets/login/vendor/bootstrap/js/popper.js')?>"></script>
    <script src="<?= site_url('assets/login/vendor/bootstrap/js/bootstrap.min.js')?>"></script>
<!--===============================================================================================-->
    <script src="<?= site_url('assets/login/vendor/select2/select2.min.js')?>"></script>
<!--===============================================================================================-->
    <script src="<?= site_url('assets/login/vendor/daterangepicker/moment.min.js')?>"></script>
    <script src="<?= site_url('assets/login/vendor/daterangepicker/daterangepicker.js')?>"></script>
<!--===============================================================================================-->
    <script src="<?= site_url('assets/login/vendor/countdowntime/countdowntime.js')?>"></script>
<!--===============================================================================================-->
    <script src="<?= site_url('assets/login/js/main.js')?>"></script>

</body>
</html>