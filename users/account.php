<?php
require_once "../models/Cart.php";
require_once "../models/Category.php";
require_once "../models/Wishlist.php";
require_once "../models/User.php";
require_once "../views/header.php";
$obj_user->profile();
?>
<section class="section white-backgorund">
    <div class="container">
        <div class="row">
            <div class="panel col-md-5 col-md-offset-3" style="border:1px solid lightgrey;">
                <div class="panel-heading text-center" style="border-bottom:1px solid lightgrey;">
                    <img src="<?php echo (BASE_URL); ?>img/team/team_01.jpg" alt="img" class="img-circle" width="100">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-6" style="border-right:1px solid #848689;">
                            <i class="fa fa-envelope"></i>&nbsp;
                            <span><b>Email</b></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span>
                                <?php
                                    echo($obj_user->email == "" ? "N/A" : ucfirst($obj_user->email));
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-6" style="border-right:1px solid #848689;">
                            <i class="fa fa-user"></i>&nbsp;
                            <span><b>First Name</b></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span>
                                <?php
                                    echo($obj_user->first_name == "" ? "N/A" : ucfirst($obj_user->first_name));
                                ?>
                            </span>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-6" style="border-right:1px solid #848689;">
                            <i class="fa fa-check"></i>&nbsp;
                            <span><b>Middle Name</b></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span><?php echo($obj_user->middle_name == "" ? "N/A" :$obj_user->middle_name ); ?></span>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-6" style="border-right:1px solid #848689;">
                            <i class="fa fa-check"></i>&nbsp;
                            <span><b>Last Name</b></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span><?php echo($obj_user->last_name == "" ? "N/A" : $obj_user->last_name) ?></span>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-6" style="border-right:1px solid #848689;">
                            <i class="fa fa-mobile"></i>&nbsp;
                            <span><b>Contact No</b></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span><?php echo($obj_user->contact_no == "" ? "N/A" : $obj_user->contact_no) ?></span>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-6" style="border-right:1px solid #848689;">
                            <i class="fa fa-calendar"></i>&nbsp;
                            <span><b>Date Of Birth</b></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span><?php echo($obj_user->date_of_birth == "" ? "N/A" : $obj_user->date_of_birth) ?></span>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-6" style="border-right:1px solid #848689;">
                            <i class="fa fa-genderless"></i>&nbsp;
                            <span><b>Gender</b></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span><?php echo($obj_user->gender == "" ? "N/A" : $obj_user->gender) ?></span>
                        </div>
                    </div>
                    <div class="row" style="margin-top:15px;">
                        <div class="col-md-6" style="border-right:1px solid #848689;">
                            <i class="fa fa-map"></i>&nbsp;
                            <span><b>Address</b></span>
                        </div>
                        <div class="col-md-6 text-center">
                            <span><?php echo($obj_user->street_address == "" ? "N/A" : $obj_user->street_address) ?></span>
                        </div>
                    </div>
                </div>
                <div class="panel-footer" style="background-color: white;">
                    <a href="" class="btn btn-sm semi-circle btn-primary ">Edit Profile</a>
                    <a href="" class="btn btn-sm btn-rounded semi-circle btn-danger ">Change Password</a>
                    <a href="" class="btn btn-sm btn-rounded btn-success semi-circle ">Change Profile Image</a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require_once "../views/footer.php"
?>