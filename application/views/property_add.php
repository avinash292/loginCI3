<div class="container">
    <div class="container">
        <div>

            <span class="row p-0 text-center">
                <h1>Hi ! <?php echo $this->session->userdata('session_data')['username']?> your Property Details </h1>
            </span>

        </div>

        <div class="row mt-5">
            <div style="float: right;">
                <a href="<?php echo base_url('user/dashboard')?>" class="btn btn-primary">Property Details!</a>
            </div>
            <?php if ($this->session->userdata('session_data')['is_login'] == 1) {?>
            <span><a href="<?php echo base_url('login/logout')?>" class="btn btn-primary">Log out</a></span>
            <?php }?>

            <form action="<?php echo base_url('user/add_property_details')?>" enctype="multipart/form-data"
                method="post" style="margine-top:7px;">
                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#home">Basic</a></li>
                    <li><a data-toggle="tab" href="#menu1">Info</a></li>
                    <li><a data-toggle="tab" href="#menu2">Figure</a></li>
                    <!-- <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
                </ul>
                <div class="tab-content">

                    <?php if ($this->session->tempdata('success')) { ?>

                    <div class="sufee-alert alert with-close alert-success"
                        style="background-color: #238023;color:white">
                        <span class="badge badge-pill badge-success">Success</span>
                        <?php echo $this->session->tempdata('success'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php } ?>

                    <?php if ($this->session->tempdata('error')) { ?>

                    <div class="sufee-alert alert with-close alert-danger"
                        style="background-color: #c31717;color:white">
                        <span class="badge badge-pill badge-danger">Unsuccess</span>
                        <?php echo($this->session->tempdata('error')); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <?php } ?>

                    <h1>
                        <p class="text-center " style="color:black">Add Property Detail
                    </h1>

                    <div id="home" class="tab-pane fade in active">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>Property ID</label>
                                                <input type="text" class="form-control" placeholder="Property ID"
                                                    name="p_id">
                                                <small class="error"><?php echo form_error('p_id');?></small>
                                            </div> <!-- form-group end.// -->
                                            <div class="form-group col-sm-6">
                                                <label>Property Name</label>
                                                <input class="form-control" type="text" name="p_name"
                                                    placeholder="Property Name">
                                                <small class="error"><?php echo form_error('p_name');?></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>Location</label>
                                                <input type="text" class="form-control" placeholder="Address"
                                                    name="p_address">
                                                <small class="error"><?php echo form_error('p_address');?></small>
                                            </div> <!-- form-group end.// -->
                                            <div class="form-group col-sm-6">
                                                <label>Pin Code</label>
                                                <input class="form-control" type="text" name="p_pincode"
                                                    placeholder="Pincode">
                                                <small class="error"><?php echo form_error('p_pincode');?></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6 ">
                                                <button class="btn btn-secondary text-white btn-sm disabled">Previous
                                                </button>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <a data-toggle="tab" href="#menu1"><button
                                                        class="btn btn-success btn-sm" style="float:right;"> Next
                                                    </button></a>
                                            </div>
                                        </div>
                                    </div> <!-- card-body end .// -->
                                </div> <!-- card.// -->
                            </div> <!-- col.//-->
                        </div> <!-- row.//-->
                    </div>
                    <div id="menu1" class="tab-pane fade ">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>Agent Name</label>
                                                <input type="text" class="form-control" placeholder="Agent Name"
                                                    name="a_name">
                                                <small class="error"><?php echo form_error('a_name');?></small>
                                            </div> <!-- form-group end.// -->
                                            <div class="form-group col-sm-6">
                                                <label>Area SQRFT</label>
                                                <input class="form-control" type="text" name="area"
                                                    placeholder="Area sqrft">
                                                <small class="error"><?php echo form_error('area');?></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group col-sm-6">
                                                <label>Facilities</label>
                                                <input type="text" class="form-control" placeholder="Facilities"
                                                    name="facilities">
                                                <small class="error"><?php echo form_error('facilities');?></small>
                                            </div> <!-- form-group end.// -->
                                            <div class="form-group col-sm-6">
                                                <label>Property Reference</label>
                                                <input class="form-control" type="text" name="p_ref"
                                                    placeholder="Property reference">
                                                <small class="error"><?php echo form_error('p_ref');?></small>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class=" form-group col-sm-6">
                                                <a data-toggle="tab" href="#home"><button
                                                        class="btn btn-success btn-sm">previous
                                                    </button></a>
                                            </div>
                                            <div class="form-group col-sm-6">
                                                <a data-toggle="tab" href="#menu2"><button
                                                        class="btn btn-success btn-sm" style="float:right;"> Next
                                                    </button></a>
                                            </div>
                                        </div>
                                    </div> <!-- card-body end .// -->
                                </div> <!-- card.// -->
                            </div> <!-- col.//-->
                        </div> <!-- row.//-->
                    </div>
                    <div id="menu2" class="tab-pane fade">
                        <div class="justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label>Property Image</label>
                                            <input type="file" name="p_photo">
                                            <small class="error"><?php echo form_error('p_photo');?></small>
                                        </div> <!-- form-group end.// -->
                                        <div class="form-group">
                                            <button class="btn btn-success btn-block"> Add Property
                                            </button>
                                        </div> <!-- form-group// -->
                                    </div> <!-- card-body end .// -->
                                </div> <!-- card.// -->
                            </div> <!-- col.//-->
                        </div> <!-- row.//-->
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>