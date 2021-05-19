<div class="container">
    <br><br>
    <h1>
        <p class="text-center" style="color:black">Registration module
    </h1>
    </p>
    <hr>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <header class="card-header">
                    <?php if ($this->session->userdata('session_data')['user_type'] == 'admin') {?>
                    <a href="<?php echo base_url('user/dashboard');?>" class=" btn btn-outline-primary mt-1">All
                        user</a>
                    <?php } ?>

                    <a href="<?php echo base_url()?>" class="float-right btn btn-outline-primary mt-1">Log in</a>
                    <h4 class="card-title mt-2">Sign up</h4>
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
                    <form action="<?php echo base_url('register/register')?>" method="post">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>User Name</label>
                                <input class="form-control" type="text" value="<?php echo set_value('username');?>"
                                    name="username" placeholder="username">
                                <small class="error"><?php echo form_error('username');?></small>
                            </div> <!-- form-group end.// -->

                            <div class="form-group col-md-6">
                                <label>Create password</label>
                                <input class="form-control" type="password" name="password"
                                    value="<?php echo set_value('password');?>" placeholder=" Password">
                                <small class="error"><?php echo form_error('password');?></small>
                            </div> <!-- form-group end.// -->
                        </div><!-- form-row.// -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Email address</label>
                                <input type="email" class="form-control" placeholder="abc@gmail.com"
                                    value="<?php echo set_value('email');?>" name=" email">
                                <small class="error"><?php echo form_error('email');?></small>
                                <div><label>Gender</label> </div>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="male">
                                    <span class=" form-check-label"> Male </span>
                                </label>
                                <label class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" value="female">
                                    <span class=" form-check-label"> Female</span>
                                </label>
                                <small class="error"><?php echo form_error('gender');?></small>
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" cols="3" name="address" placeholder="Address"
                                    value="<?php echo set_value('address');?>"></textarea>
                                <small class=" error"><?php echo form_error('address');?></small>
                            </div> <!-- form-group end.// -->
                        </div><!-- form-row.// -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>City</label>
                                <input type="text" class="form-control" placeholder="City" name="city"
                                    value="<?php echo set_value('city');?>">
                                <small class="error"><?php echo form_error('city');?></small>
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                                <label>State</label>
                                <select id="inputState" class="form-control" name="state">
                                    <option value="" selected="selected"> Please Select</option>
                                    <option value="Uttar Pradesh" <?php echo set_select('state', 'Uttar Pradesh'); ?>>
                                        Uttar Pradesh</option>
                                    <option value="Kanpur" <?php echo set_select('state', 'Kanpur'); ?>>Kanpur</option>
                                    <option value="Lucknow" <?php echo set_select('state', 'Lucknow'); ?>>Lucknow
                                    </option>
                                    <option value="Varanashi" <?php echo set_select('state', 'Varanashi'); ?>>Varanashi
                                    </option>
                                    <option value="Mirzapur" <?php echo set_select('state', 'Mirzapur'); ?>>Mirzapur
                                    </option>
                                </select>
                                <small class="error"><?php echo form_error('state');?></small>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label>Country</label>
                                <select id="inputState" class="form-control" name="country">
                                    <option value="">Please select</option>
                                    <option value="India" <?php echo set_select('country', 'India'); ?>>India</option>
                                    <option value="Pakistan" <?php echo set_select('country', 'Pakistan'); ?>>Pakistan
                                    </option>
                                    <option value="United States" <?php echo set_select('country', 'United States'); ?>>
                                        United States</option>
                                    <option value="America" <?php echo set_select('country', 'America'); ?>>America
                                    </option>
                                    <option value="Afganistan" <?php echo set_select('country', 'Afganistan'); ?>>
                                        Afganistan</option>
                                </select>
                                <small class="error"><?php echo form_error('country');?></small>
                            </div> <!-- form-group end.// -->
                            <div class="form-group col-md-6">
                                <label>Pin Code</label>
                                <input type="text" class="form-control" name="pincode" placeholder="Pin"
                                    value="<?php echo set_value('pincode');?>">
                                <small class="error"><?php echo form_error('pincode');?></small>
                            </div> <!-- form-group end.// -->
                        </div> <!-- form-row.// -->


                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block"> Register </button>
                        </div> <!-- form-group// -->
                    </form>
                    <span>Already Have Account ?<a href="<?php echo base_url()?>" class="text-primary"> Log
                            in</a></span>
                </div> <!-- card-body end .// -->
            </div>
            <!--
 card.// -->
        </div> <!-- col.//-->
    </div> <!-- row.//-->
</div>
<!--container end.//-->
