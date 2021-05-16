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

        <?php if (count($all) == 0) { ?>
        <div class="container bg-success text-white text-center mt-5"
            style="margin-top: 55px;background-color: seagreen; color: powderblue;">
            <h3>Opps! There Is No Records !!</h3>
        </div>
        <?php } else {?>
        <div class="row mt-5">
            <div style="float: right;">
                <a href="<?php echo base_url('user')?>" class="btn btn-primary">All Users</a>
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
                        <th scope="col">Action</th>
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
                                <button type="submit" class="btn btn-warning btn-sm">Property
                                    Details</button>
                            </form>
                        </td>
                        <!-- <td><a href="<?php echo base_url('user/dashboard')?>/<?php echo $user['id'];?>">Property
                                Details</a></td> -->
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
        <?php }?>