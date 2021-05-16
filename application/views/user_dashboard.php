<div class="container">
    <div class="container">

        <div>
            <span class="row p-0 text-center">

                <h1>Hi ! <?php echo $this->session->userdata('session_data')['username']?> your
                    Property Details </h1>
            </span>
            <?php if ($this->session->userdata('session_data')['is_login'] == 1) {?>
            <span><a href="<?php echo base_url('login/logout')?>" class="btn btn-primary">Log out</a></span>
            <?php }?>
        </div>

        <div class="row mt-5">
            <div style="float: right;">
                <a href="<?php echo base_url('user/add_property')?>" class="btn btn-primary">+ Add
                    Property !</a>
            </div>
            <?php if (count($pd) == 0) { ?>
            <div class="container bg-success text-white text-center mt-5"
                style="margin-top: 55px;background-color: seagreen; color: powderblue;">
                <h3>Opps! There Is No Records !!</h3>
            </div>
            <?php } else {?>

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
                    <?php foreach ($pd as $p_details) { ?>
                    <tr>
                        <td><?php echo $p_details['p_id'];?></td>
                        <td><?php echo $p_details['p_name'];?></td>
                        <td><?php echo $p_details['p_address'];?></td>
                        <td><?php echo $p_details['p_pincode'];?></td>
                        <td><?php echo $p_details['a_name'];?></td>
                        <td><?php echo $p_details['area'];?></td>
                        <td><?php echo $p_details['facilities'];?></td>
                        <td><?php echo $p_details['p_ref'];?></td>
                        <td><?php echo $p_details['p_photo'];?></td>
                        <td><a href="<?php echo base_url('user/edit_user');?>/<?php echo $p_details['id'];?>"
                                class="btn btn-success btn-sm">Edit</a>
                            <a href="" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table><?php }?>
        </div>
