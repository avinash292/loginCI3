<div class="container">
    <div class="container">

        <div>
            <span class="row p-0 text-center">

                <h1><?php echo $un[0];?>'s
                    Property Details </h1>
            </span>
            <?php if ($this->session->userdata('session_data')['is_login'] == 1) {?>
            <span><a href="<?php echo base_url('login/logout')?>" class="btn btn-primary">Log out</a></span>
            <?php }?>
        </div>
        <div class="row mt-5">
            <div style="float: right;">
                <span><a href="<?php echo base_url('user/add_property');?>/<?php echo $un[2];?>"
                        class="btn btn-success">Add
                        Property</a></span>
                <a href="<?php echo base_url('user')?>" class="btn btn-primary">All Users</a>
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
            <?php if (count($un[1]) == 0) { ?>
            <div class="container bg-success text-white text-center mt-5"
                style="margin-top: 55px;background-color: seagreen; color: powderblue;">
                <h3>Opps! There Is No Records !!</h3>
                <span><a href="<?php echo base_url('user/add_property');?>/<?php echo $un[2];?>"
                        class="btn btn-sm btn-danger">Add
                        Property</a></span>
            </div>
            <?php } else {?>
            <form action="<?php echo base_url('user/del_property');?>" name="property_details" method="post"
                id="property_details">
                <table class="table table-striped">
                    <thead class="text-dark">
                        <tr>
                            <th scope="col">Property ID</th>
                            <th scope="col">Property Name</th>
                            <th scope="col">Property Address</th>
                            <th scope="col">Property Pincode</th>
                            <th scope="col">Agent Name</th>
                            <th scope="col">Area</th>
                            <th scope="col">Facilities</th>
                            <th scope="col">Property Ref</th>
                            <th scope="col">Property Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($un[1] as $p_details) { ?>
                        <tr>
                            <td><?php echo $p_details['p_id'];?></td>
                            <td><?php echo $p_details['p_name'];?></td>
                            <td><?php echo $p_details['p_address'];?></td>
                            <td><?php echo $p_details['p_pincode'];?></td>
                            <td><?php echo $p_details['a_name'];?></td>
                            <td><?php echo $p_details['area'];?></td>
                            <td><?php echo $p_details['facilities'];?></td>
                            <td><?php echo $p_details['p_ref'];?></td>
                            <td><img src="<?php echo base_url('./assets/uploads/'.$p_details['p_photo']);?>"
                                    height="50px" width="50px" style="border-radius:50%"
                                    alt="<?php echo $p_details['p_photo'];?>"></td>
                            <td>
                                <a href="<?php echo base_url('user/edit_property');?>/<?php echo $p_details['id'];?>"
                                    class="btn btn-success btn-sm">Edit</a>
                                <a href="javascript:delete_property(<?php echo $p_details['id']; ?>);"
                                    class="btn btn-danger btn-sm">Delete</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <input type="hidden" name="act" id="act" />
                <input type="hidden" name="p_id" id="p_id" />
                </from>
        </div>

        <?php }?>