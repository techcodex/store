<?php
require_once "../../models/Admin.php";
require_once "../../models/Brand.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";

if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

if(!isset($_GET['id'])){
    header("Location:".BASE_URL."brands/index.php");
}
$brand = Brand::getAllbrands($_GET['id']);

?>
<div class="row">
    <div class="panel panel-white">
        <div class="panel-heading text-center">
            <h3 class="panel-title" style="font-size: 15px;"> 
            <span class="fa fa-user"></span>
             Brands / Update Brand</h3>
            <hr>
        </div>
        
        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="<?php echo(BASE_URL); ?>brands/process/process_edit_brand.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo($brand->id); ?>">
                <div class="form-group <?php if(isset($errors['name'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Brand Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control input-rounded" id="name" placeholder="Enter Brand Name" name="name" value="<?php echo($brand->name) ?>">
                        <?php
                            if(isset($errors['name'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['name']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['image'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control input-rounded" id="image" name="image">
                        <?php
                            if(isset($errors['image'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['image']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary col-md-offset-5" value="Update">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once "../views/footer.php"
?>