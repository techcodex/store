<?php
require_once "../../models/Admin.php";
require_once "../../models/User.php";
require_once "../../models/Product.php";
require_once "../../models/Category.php";
require_once "../../models/Brand.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}

if(isset($_SESSION['obj_product'])) {
    $obj_product = unserialize($_SESSION['obj_product']);
} else {
    $obj_product = new Product();
}
?>
<div class="row">
    <div class="panel panel-white">
        <div class="panel-heading text-center">
            <h3 class="panel-title" style="font-size: 15px;"> 
            <span class="fa fa-user"></span>
             Products / Add New Product</h3>
            <hr>
        </div>
        
        <div class="panel-body">
            <form class="form-horizontal" method="post" action="<?php echo(BASE_URL); ?>products/process/process_create.php" enctype="multipart/form-data">

                <div class="form-group <?php if(isset($errors['name'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Product Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="productName" value="<?php echo($obj_product->name); ?>" name="name" placeholder="Enter Product Name">
                        <?php
                            if(isset($errors['name'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['name']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['features'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Features</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control " id="feature" name="features" <?php echo($obj_product->features); ?> placeholder="Enter Product Feature">
                        <?php
                            if(isset($errors['features'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['features']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['description'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control " name="description" <?php echo($obj_product->description) ?> placeholder="Enter Product Description"></textarea>
                        <?php
                            if(isset($errors['description'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['description']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['quantity'])) { echo('has-error'); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Quantity</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="quantity" name="quantity" <?php echo($obj_product->quantity); ?> placeholder="Enter Product Quantity">
                        <?php
                            if(isset($errors['quantity'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['quantity']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['price'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Unit Price</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="price" name="price" <?php echo($obj_product->price); ?> placeholder="Enter Product Price">
                        <?php
                            if(isset($errors['price'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['price']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['image'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Image</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control " id="image" name="image">
                        <?php
                            if(isset($errors['image'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['image']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['brand_id'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Brand</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="brand_id">
                            <option value="">--Select Brand--</option>
                            <?php
                                $brands = Brand::getBrands();
                                foreach($brands as $brand) {
                                    if($obj_product->brand_id == $brand->id) {
                                        echo("<option value='".$brand->id."' selected >".$brand->name."</option>");
                                    } else {
                                        echo("<option value='".$brand->id."'>".$brand->name."</option>");
                                    }
                                    
                                }
                            ?>
                        </select>
                        <?php
                            if(isset($errors['brand_id'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['brand_id']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['category_id'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="category_id">
                            <option value="">--Select Category--</option>
                            <?php
                                $categories = Category::getCategories();
                                foreach($categories as $category) {
                                    if($obj_product->category_id == $category->id) {
                                        echo("<option value='".$category->id."' selected >".$category->name."</option>");
                                    } else {
                                        echo("<option value='".$category->id."'>".$category->name."</option>");
                                    }
                                }
                            ?>
                        </select>
                        <?php
                            if(isset($errors['category_id'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['category_id']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group <?php if(isset($errors['user_id'])) { echo("has-error"); } ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">User</label>
                    <div class="col-sm-10">
                        <select class="form-control " name="user_id">
                            <option value="">--Select User--</option>
                            <?php
                                $users = User::show_all_users();
                                foreach($users as $user) {
                                    if($user->user_id == $obj_product->user_id) {
                                        echo("<option value='".$user->user_id."' selected >".$user->user_name."</option>");
                                    } else {
                                        echo("<option value='".$user->user_id."'>".$user->user_name."</option>");
                                    }
                                }
                            ?>
                        </select>
                        <?php
                            if(isset($errors['user_id'])) {
                                echo("<span style='margin-left:1%;' class='text-danger'>".$errors['user_id']."</span>");
                            }
                        ?>
                    </div>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary col-md-offset-5" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
require_once "../views/footer.php";
?>