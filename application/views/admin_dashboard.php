<div class="container">
    <div class="container">
        <div>
            <span class="row p-0 text-center">
                <h1>Hi ! <?php echo $this->session->userdata('session_data')['user_type'];?> All User Details </h1>
            </span>
            <?php if ($this->session->userdata('session_data')['is_login'] == 1) {?>
            <span><a href="<?php echo base_url('login/logout')?>" class="btn btn-primary">Log out</a></span>
            <?php }?>
        </div>
        <div class="container mt-10" style="margin-top: 40px;">
            <?php if ($this->session->tempdata('success')) { ?>

            <div class=" sufee-alert alert with-close alert-success" style="background-color: #238023;color:white">
                <span class="badge badge-pill badge-success">Success</span>
                <?php echo $this->session->tempdata('success'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php } ?>

            <?php if ($this->session->tempdata('error')) { ?>

            <div class="sufee-alert alert with-close alert-danger" style="background-color: #c31717;color:white">
                <span class="badge badge-pill badge-danger">Unsuccess</span>
                <?php echo($this->session->tempdata('error')); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php } ?>
        </div>

        <?php if (count($all) == 0) { ?>
        <div style="float: right;">
            <a href="<?php echo base_url('register')?>" class="btn btn-primary">Add Users</a>
        </div>
        <div class="container bg-success text-white text-center mt-5"
            style="margin-top: 55px;background-color: seagreen; color: powderblue;">
            <h3>Opps! There Is No Records !!</h3>
        </div>
        <?php } else {?>
        <div class="row mt-5">
            <div style="float: right;">
                <span class="mr-3"><a href="<?php echo base_url('register')?>" class="btn btn-primary ">Add
                        Users</a></span>
                <!-- &nbsp&nbsp<span><a href="<?php echo base_url('user')?>"
                        class="btn btn-primary">All
                        Users</a></span> -->

            </div>
            <table class="table table-striped">
                <thead class="text-dark">
                    <tr>
                        <th scope="col">User name</th>
                        <th scope="col">Password</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">Gender</th>
                        <th scope="col">City</th>
                        <th scope="col">State</th>
                        <th scope="col">Country</th>
                        <th scope="col">Pincode</th>
                        <th scope="col">Total property/Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all as $user) { ?>
                    <tr>
                        <td><?php echo $user['username'];?></td>
                        <td><?php echo $user['password'];?></td>
                        <td><?php echo $user['email'];?></td>
                        <td><?php echo $user['address'];?></td>
                        <td><?php echo $user['gender'];?></td>
                        <td><?php echo $user['city'];?></td>
                        <td><?php echo $user['state'];?></td>
                        <td><?php echo $user['country'];?></td>
                        <td><?php echo $user['pincode'];?></td>
                        <td>
                            <form action="<?php echo base_url('user/userdata')?>" method="post">
                                <input type="hidden" name="username" value="<?php echo $user['username'];?>" />
                                <input type="hidden" name="u_id" value="<?php echo $user['id'];?>" />
                                <button type="submit" class="btn btn-warning btn-sm"><span
                                        style="color: firebrick; font-weight: bolder; font-size: larger;"><?php
                                        $u_id = $user['id'];
                                        $total_property = $this->pm->all_property($u_id);
                                        echo($total_property);
                                        ?></span><span>&nbspProperty
                                        Info</span></button>
                                <a href="<?php echo base_url('user/delete_user')?>/<?php echo $user['id'];?>"
                                    class="btn btn-sm btn-danger" style="font-size:15px;">Delete</a>
                            </form>

                        </td>

                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>




        <?php }?>