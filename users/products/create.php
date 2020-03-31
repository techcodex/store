<?php
require_once "../../models/User.php";
require_once "../../models/Product.php";
require_once "../../models/Brand.php";
require_once "../../models/Cart.php";
require_once "../../models/Order.php";
require_once "../../models/Wishlist.php";
require_once "../../models/Category.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
if(isset($_SESSION['obj_product'])) {
    $obj_product = unserialize($_SESSION['obj_product']);
} else {
    $obj_product = new Product();
}
if(isset($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>
<div class="row" style="font-size:15px;">
    <form action="<?php echo(BASE_URL); ?>users/products/process/process_create.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="user_id" value="<?php echo($obj_user->user_id); ?>">
        <div class="form-group <?php if($errors['name']) { echo("has-error"); } ?>" >
            <label for="name" >Product Name:</label>
            <input type="text" class="form-control" autofocus name="name" value="<?php echo($obj_product->name); ?>" placeholder="Enter Product Name">
            <?php
                if(isset($errors['name'])) {
                    echo("<span class='text-danger'>".$errors['name']."</span>");
                }
            ?>
        </div>
        <div class="form-group <?php if($errors['price']) { echo("has-error"); } ?>">
            <label for="" >Unit Price:</label>
            <input type="number" class="form-control" name="price" placeholder="Enter Unit Price" value="<?php echo($obj_product->price); ?>">
            <?php
                if(isset($errors['price'])) {
                    echo("<span class='text-danger'>".$errors['price']."</span>");
                }
            ?>
        </div>
        <div class="form-group <?php if($errors['quantity']) { echo("has-error"); } ?>">
            <label for="" style="font-size:15px;">Quantity:</label>
            <input type="number" class="form-control" name="quantity" placeholder="Enter Quantity" value="<?php echo($obj_product->quantity); ?>">
            <?php
                if(isset($errors['quantity'])) {
                    echo("<span class='text-danger'>".$errors['quantity']."</span>");
                }
            ?>
        </div>
        <div class="form-group <?php if($errors['features']) { echo("has-error"); } ?>">
            <label for="" style="font-size:15px;">Features:</label>
            <textarea class="form-control" name="features" placeholder="Enter Product Features"><?php echo($obj_product->features);?></textarea>
            <?php
                if(isset($errors['features'])) {
                    echo("<span class='text-danger'>".$errors['features']."</span>");
                }
            ?>
        </div>
        <div class="form-group <?php if($errors['description']) { echo("has-error"); } ?>">
            <label for="" style="font-size:15px;">Description:</label>
            <textarea placeholder="Enter Product Description" name="description" class="form-control"><?php echo($obj_product->description); ?></textarea>
            <?php
                if(isset($errors['description'])) {
                    echo("<span class='text-danger'>".$errors['description']."</span>");
                }
            ?>
        </div>
        <div class="form-group <?php if($errors['brand_id']) { echo("has-error"); } ?>">
            <label for="" style="font-size:15px;">Brand:</label>
            <select class="form-control" name="brand_id">
                <option value="">--Select Brand--</option>
                <?php
                    $brands = Brand::getBrands();
                    foreach($brands as $brand) {
                        if($brand->id == $obj_product->brand_id) {
                            echo("<option value='".$brand->id."' selected>".$brand->name."</option>");
                        } else {
                            echo("<option value='".$brand->id."'>".$brand->name."</option>");
                        }
                        
                    }
                ?>
            </select>
            <?php
                if(isset($errors['brand_id'])) {
                    echo("<span class='text-danger'>".$errors['brand_id']."</span>");
                }
            ?>
        </div>
        <div class="form-group <?php if($errors['category_id']) { echo("has-error"); } ?>">
            <label for="" style="font-size:15px;">Category:</label>
            <select class="form-control" name="category_id">
                <option value="">--Select Category--</option>
                <?php
                    $categories = Category::getCategories();
                    foreach($categories as $category) {
                        if($category->id == $obj_product->category_id) {
                            echo("<option value='".$category->id."' selected>".$category->name."</option>");
                        } else {
                            echo("<option value='".$category->id."'>".$category->name."</option>");
                        }
                        
                    }
                ?>
            </select>
            <?php
                if(isset($errors['category_id'])) {
                    echo("<span class='text-danger'>".$errors['category_id']."</span>");
                }
            ?>
        </div>
        <div class="form-group <?php if($errors['image']) { echo("has-error"); } ?>">
            <label for="iamge" style="font-size:15px;">Product Image</label>
            <input type="file" class="form-control" name="image">
            <?php
                if(isset($errors['image'])) {
                    echo("<span class='text-danger'>".$errors['image']."</span>");
                }
            ?>
        </div>
        <input type="submit" value="save" class="btn col-md-offset-5 btn-danger">
    </form>
</div>
<?php
require_once "../views/footer.php";
require_once "../../views/footer.php";
?>