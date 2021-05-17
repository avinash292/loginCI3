<?php error_reporting(0);?>
<div class="container">
    <br><br>
    <h1>
        <p class="text-center" style="color:black">LogIn module
    </h1>
    </p>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <a href="<?php echo base_url()?>register" class="float-right btn btn-outline-primary mt-1">Sign
                        Up</a>
                    <h4 class="card-title mt-2">LogIn</h4>
                </header>
                <div class="card-body">
                    <?php if ($this->session->tempdata('success')) { ?>

                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        <span class="badge badge-pill badge-success">Success</span>
                        <?php echo $this->session->tempdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php } ?>

                    <?php if ($this->session->tempdata('error')) { ?>

                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                        <span class="badge badge-pill badge-danger">Unsuccess</span>
                        <?php echo $this->session->tempdata('error'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php } ?>
                    <form action="<?php echo base_url('login/CkeckLogin')?>" method="post">
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="abc@gmail.com" name="email">
                            <small class="error"><?php echo form_error('email');?></small>
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <label>password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password">
                            <small class="error"><?php echo form_error('password');?></small>
                        </div> <!-- form-group end.// -->
                        <!-- <div class="form-group form-check mb-3">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" name="remember"> Remember me
                            </label>
                        </div> -->

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block"> Login </button>
                        </div> <!-- form-group// -->
                    </form>
                    <span>Don't Have Account ?<a href="<?php base_url()?>register" class="text-primary">Sign
                            Up</a></span>
                </div> <!-- card-body end .// -->
            </div> <!-- card.// -->
        </div> <!-- col.//-->
    </div> <!-- row.//-->
</div>
<!--container end.//-->