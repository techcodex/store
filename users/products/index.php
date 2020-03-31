<?php
require_once "../../models/User.php";
require_once "../../models/Product.php";
require_once "../../models/Cart.php";
require_once "../../models/Order.php";
require_once "../../models/Wishlist.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
$products = Product::userProducts($obj_user->user_id);
?>
<div class="row " style="font-size:12px;">
    <div class="col-md-12 table-responsive">
        <table class="table table-striped table-bordered" id="productsData">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Description</th>
                    <th>Features</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $i = 1;
                foreach($products as $product) {
                    echo("<tr>");
                    echo("<td>".$i++."</td>");
                    echo("<td>".$product->product_name."</td>");
                    echo("<td>".$product->price."</td>");
                    echo("<td>".$product->quantity."</td>");
                    if($product->description == "") {
                        echo("<td>N/A</td>");
                    } else {
                        echo("<td>".$product->description."</td>");
                    }
                    if($product->features == "") {
                        echo("<td>N/A</td>");
                    } else {
                        echo("<td>".$product->features."</td>");
                    }
                    echo("<td>".$product->brand_name."</td>");
                    echo("<td>".$product->category_name."</td>");
                    echo("<td><a href='".BASE_URL."users/products/edit.php?id=$product->product_id' style='color:blue;'><i class='fa fa-edit'></i></a>");
                    if($product->status == 0) {
                        echo("<a href='".BASE_URL."users/products/process/process_active.php?id=$product->product_id' style='color:green;margin-left:5px;'><i class='fa fa-unlock'></i></a>");
                    } else {
                        echo("<a href='".BASE_URL."users/products/process/process_deactive.php?id=$product->product_id' style='color:red;margin-left:5px;'><i class='fa fa-lock'></i></a>");
                    }
                    echo("</td>");
                    echo("</tr>");
                }
            ?>
            </tbody>
            
        </table>
    </div>
</div>
<?php
require_once "../views/footer.php";
require_once "../../views/footer.php";
?>
<script>
    $(document).ready(function(e) {
        $("#productsData").DataTable();
    });
</script>