<div class="container">
    <br><br>
    <h1>
        <p class="text-center" style="color:black">Admin Registration Module
    </h1>
    </p>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <a href="<?php echo base_url()?>" class="float-right btn btn-outline-primary mt-1">Login</a>
                    <h4 class="card-title mt-2">Sign Up</h4>
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
                    <form action="<?php echo base_url('admin/admin_registration')?>" method="post">

                        <div class="form-group">
                            <label>User Name</label>
                            <input type="text" class="form-control" placeholder="User Name" name="name">
                            <small class="error"><?php echo form_error('name');?></small>
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" placeholder="abc@gmail.com" name="email">
                            <small class="error"><?php echo form_error('email');?></small>
                        </div> <!-- form-group end.// -->
                        <div class="form-group">
                            <label>password</label>
                            <input class="form-control" type="password" name="password" placeholder="Password">
                            <small class="error"><?php echo form_error('password');?></small>
                        </div>
                        <div class="form-group">
                            <label>User Type</label>
                            <select id="inputState" class="form-control" name="user_type">
                                <option value="">Please select</option>
                                <option value="admin" <?php echo set_select('user_type', 'admin'); ?>>admin</option>
                                <option value="superAdmin" <?php echo set_select('user_type', 'superAdmin'); ?>>
                                    superAdmin
                                </option>
                            </select>
                            <small class="error"><?php echo form_error('user_type');?></small>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-block"> Register </button>
                        </div> <!-- form-group// -->
                    </form>
                    span>Already Have Account ?<a href="<?php echo base_url()?>" class="text-primary"> Log
                        in</a></span>
                </div> <!-- card-body end .// -->
            </div> <!-- card.// -->
        </div> <!-- col.//-->
    </div> <!-- row.//-->
</div>

<!--container end.//-->