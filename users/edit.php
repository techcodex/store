<?php
require_once "../models/Cart.php";
require_once "../models/Wishlist.php";
require_once "../models/Category.php";
require_once "../models/User.php";
require_once "../models/Location.php";
require_once "../views/header.php";
$obj_user->profile();
?>
<div class="container" style="margin-top: 30px;">
    <form class="well form-horizontal" action="<?php echo(BASE_URL."users/process/process_account.php"); ?>" method="post" id="update_profile">
        <fieldset>
            <legend>
                <center>
                    <h2><b>User Profile</b></h2>
                </center>
            </legend><br>
            <?php
                if(isset($_SESSION['errors'])) {
                    $errors = $_SESSION['errors'];
                    unset($_SESSION['errors']);
                }
            ?>
            <!-- Text input-->
            <div class="form-group <?php if(isset($errors['first_name'])) { echo("has-error"); } ?>">
                <label class="col-md-4 control-label">First Name</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="first_name" placeholder="First Name" class="form-control" value="<?php echo($obj_user->first_name); ?>" type="text">
                    </div>
                    <?php
                        if(isset($errors['first_name'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['first_name']."</span>");
                        }
                    ?>
                    
                </div>
            </div>


            <div class="form-group <?php if(isset($errors['last_name'])) { echo("has-error"); } ?>">
                <label class="col-md-4 control-label">Last Name</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="last_name" placeholder="Last Name" value="<?php echo($obj_user->last_name); ?>" class="form-control" type="text">
                    </div>
                    <?php
                        if(isset($errors['last_name'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['last_name']."</span>");
                        }
                    ?>
                </div>
            </div>

            <div class="form-group <?php if(isset($errors['middle_name'])) { echo("has-error"); } ?>">
                <label class="col-md-4 control-label">Middle Name</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input name="middle_name" placeholder="Middle Name" value="<?php echo($obj_user->middle_name); ?>" class="form-control" value="" type="text">
                    </div>
                    <?php
                        if(isset($errors['middle_name'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['middle_name']."</span>");
                        }
                    ?>
                </div>
            </div>

            <div class="form-group <?php if(isset($errors['contact_number'])) { echo("has-error"); } ?>">
                <label class="col-md-4 control-label">Contact No</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input name="contact_number" placeholder="Contact Number" class="form-control" type="text" value="<?php echo($obj_user->contact_no); ?>">
                    </div>
                    <?php
                        if(isset($errors['contact_number'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['contact_number']."</span>");
                        }
                    ?>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-4 control-label">Gender</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group">
                    <label>
                        <input type="radio" name="gender[]" value="male" <?php if($obj_user->gender == "male") { echo('checked'); }   ?> >
                        &nbsp;Male
                        </label>
                        <label>&nbsp;&nbsp;&nbsp;Female&nbsp;
                            <input type="radio" name="gender[]" value="female" <?php if($obj_user->gender == "female") { echo('checked'); }   ?> >
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group <?php if(isset($errors['date_of_birth'])) { echo("has-error"); } ?>">
                <label class="col-md-4 control-label">Date Of Birth</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                        <input name="date_of_birth" class="form-control" id="date" type="text" value="" autocomplete="off">
                    </div>
                    <?php
                        if(isset($errors['date_of_birth'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['date_of_birth']."</span>");
                        }
                    ?>
                </div>
            </div>

            <!-- Text input-->
            <div class="form-group <?php if(isset($errors['street_address'])) { echo("has-error"); } ?>">
                <label class="col-md-4 control-label">Street Address</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-bookmark"></i></span>
                        <textarea class="form-control" name="street_address" cols="40" rows="5"><?php echo($obj_user->street_address); ?></textarea>
                    </div>
                    <?php
                        if(isset($errors['street_address'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['street_address']."</span>");
                        }
                    ?>
                </div>
            </div>
            <div class="form-group <?php if(isset($errors['country_id'])) { echo("has-error"); } ?>">
                <label class="col-md-4 control-label">Country</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                        <select class="form-control" id="country_id" name="country_id">
                            <option value="">--Select Country</option>
                            <?php
                                $countries = Location::getCountries();
                                foreach($countries as $country) {
                                    if($obj_user->country_id == $country->id) {
                                        echo("<option  value='".$country->id."' selected >".$country->name."</option>");
                                    } else {
                                        echo("<option  value='".$country->id."'>".$country->name."</option>");
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <?php
                        if(isset($errors['country_id'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['country_id']."</span>");
                        }
                    ?>
                </div>
            </div>

            <div class="form-group <?php if(isset($errors['state_id'])) { echo("has-error"); } ?>">
                <label class="col-md-4 control-label">State</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                        <select class="form-control" name="state_id" id="state_id">
                            <option value="">--Select State--</option>
                        </select>
                        <span class="input-group-addon">
                            <span class="state_loader"></span>
                        </span>
                    </div>
                    <?php
                        if(isset($errors['state_id'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['state_id']."</span>");
                        }
                    ?>
                </div>
            </div>

            <div class="form-group <?php if(isset($errors['city_id'])) { echo("has-error"); } ?>">
                <label class="col-md-4 control-label">City</label>
                <div class="col-md-5 inputGroupContainer">
                    <div class="input-group ">
                        <span class="input-group-addon"><i class="fa fa-bars"></i></span>
                        <select class="form-control" name="city_id" id="city_id">
                            <option value="">--Select City--</option>
                        </select>
                        <div class="input-group-addon">
                            <span class="city_loader"></span>
                        </div>
                    </div>
                    <?php
                        if(isset($errors['city_id'])) {
                            echo("<span class='text-danger col-md-offset-1'>".$errors['city_id']."</span>");
                        }
                    ?>
                </div>
            </div>


            <!-- Button -->
            <div class="form-group">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4 col-md-offset-1"><br>
                    <button type="submit" class="btn btn-default-outline semi-circle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Update <span class="glyphicon glyphicon-send"></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                </div>
            </div>

        </fieldset>
    </form>
</div>
<?php
require_once "../views/footer.php";
?>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready((e)=>{
    var country_id = $("#country_id").val();
    var state_id = $("#state_id").val();
    if(country_id != "") {
        getStates(country_id);
    }
    if(state_id != "") {
        getCities(state_id);
    }
    $("#country_id").change((e)=>{
        var id = $("#country_id").val();
        getStates(id);
    }); 
    $("#state_id").change((e)=>{
        var id = $("#state_id").val();
        getCities(id);
    });
    
    $("#date").datepicker({ dateFormat: "yy-mm-dd"}).datepicker("setDate", new Date());

    function getStates(id) {
        var data = {
            id:id,
            action:'get_states'
        }; 
        $.ajax({
            url:"<?php echo(BASE_URL);  ?>users/process/process_location.php",
            data:data,
            dataType:'JSON',
            type:'POST',
            beforeSend(xhr) {
                $(".state_loader").html(loader);
            },
            complete:function(jqXHR,textStatus) {
                if(jqXHR.status == 200) {
                    var result = JSON.parse(jqXHR.responseText);
                    if(result.hasOwnProperty('success')) {
                        var states = result.states;
                        var output = "";
                        states.forEach((state)=>{
                            output += "<option value='"+state.id+"' >"+state.name+"</option>";
                        });
                        $("#state_id > option ~ option").remove();
                        $("#state_id").append(output);
                    } else if(result.hasOwnProperty('error')) {
                        console.log(result.msg);
                    } else {
                        alert("Contact Admin "+jqXHR.status);
                    }
                    $(".state_loader").html("");
                }
            }
        });
    }
    function getCities(id) {
        var data = {
            id:id,
            action:'get_cities',
        };
        $.ajax({
            url:"<?php echo(BASE_URL); ?>users/process/process_location.php",
            data:data,
            dataType:'JSON',
            type:'POST',
            beforeSend(xhr) {
                $(".city_loader").html(loader);
            },
            complete:function(jqXHR,textStatus) {
                if(jqXHR.status == 200) {
                    var result = JSON.parse(jqXHR.responseText);
                    if(result.hasOwnProperty('success')) {
                        var cities = result.cities;
                        var output = "";
                        cities.forEach((city)=>{
                            output += "<option value='"+city.id+"'>"+city.name+"</option>";
                        });
                        $("#city_id > option ~ option").remove();
                        $("#city_id").append(output);
                    } else if(result.hasOwnProperty('error')) {
                        console.log(result.msg);
                    } else {
                        alert("Contact Admin "+jqXHR.status);
                    }
                }
                $(".city_loader").html("");
            }
        });
    }
});
</script>