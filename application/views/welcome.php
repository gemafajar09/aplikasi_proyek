<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="<?= site_url('assets/assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?= site_url('assets/assets/css/atlantis.min.css')?>">
    <link rel="stylesheet" href="<?= site_url('assets/assets/css/demo.css')?>">
</head>
<style type="text/css">
    .modal-transparent{
        background: transparent;
    }
</style>
<body >
    <img src="<?= site_url('assets/LOG1.png') ?>" style="width: 90%;padding-top: 200px;padding-left: 120px; z-index: -99;" >
<div id="myModal" class="modal modal-transparent" role="dialog">
    <div class="modal-dialog" >

        <!-- Modal content-->
        <div class="modal-content">
            <img src="<?= site_url('assets/mediatama.png') ?>"  style="z-index: width=60px; -99;" >
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <a href="<?= site_url('login') ?>">
                            <div class="card card-secondary">
                                <div class="card-body skew-shadow">
                                    <h3>Login Admin</h3>
                                    <h5 class="op-8"></h5>
                                    <div class="pull-right">
                                        <h3 class="fw-bold op-8"></h3>
                                    </div>
                                    <div class="pull-right">
                                        <h3 class="fw-bold op-8"></h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-md-6">
                        <a href="<?= site_url('user/login') ?>">
                            <div class="card card-secondary">
                                <div class="card-body skew-shadow">
                                    <h3>Login Programer</h3>
                                    <h5 class="op-8"></h5>
                                    <div class="pull-right">
                                        <h3 class="fw-bold op-8"></h3>
                                    </div>
                                    <div class="pull-right">
                                        <h3 class="fw-bold op-8"></h3>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="<?= site_url('assets/assets/js/core/jquery.3.2.1.min.js')?>"></script>
    <script src="<?= site_url('assets/assets/js/core/popper.min.js')?>"></script>
    <script src="<?= site_url('assets/assets/js/core/bootstrap.min.js')?>"></script>
    <script>
$('#myModal').modal('show');
</script>
</body>
</html>



