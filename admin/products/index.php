<?php
require_once "../../models/Admin.php";
require_once "../../models/Product.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Products List</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Features</th>
                            <th>Description</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            $products = Product::showAllProductsAdmin();
                            foreach($products as $product) {
                                echo("<tr>");
                                echo("<td>".$i++."</td>");
                                echo("<td>".$product->product_name."</td>");
                                echo("<td>".$product->quantity."</td>");
                                echo("<td>".$product->price."</td>");
                                if($product->features == "") {
                                    echo("<td>N/A</td>");
                                } else {
                                    echo("<td>".$product->features."</td>");
                                }
                                if($product->description == "") {
                                    echo("<td>N/A</td>");
                                } else {
                                    echo("<td>".$product->description."</td>");
                                }
                                echo("<td>".$product->brand_name."</td>");
                                echo("<td>".$product->category_name."</td>");
                                echo("<td><img src='".WEB_BASE_URL."img/user_products/".$product->image."' alt='img' width='50'></td>");
                                echo("<td>");
                                echo("<a href='".BASE_URL."products/edit.php?id=$product->product_id'><i class='fa fa-edit'></i></a>");
                                if($product->status == 1) {
                                    echo("<a href='".BASE_URL."products/process/process_deactive.php?id=$product->product_id' style='color:red;' style='margin-left:10px;'><i class='fa fa-lock'></i></a>");
                                } else {
                                    echo("<a href='".BASE_URL."products/process/process_active.php?id=$product->product_id' style='color:green;' style='margin-left:10px;'><i class='fa fa-unlock'></i></a>");
                                }
                                echo("</td>");
                                echo("</tr>");
                            }
                        ?>
                    </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
</div><!-- Row -->
<?php
require_once "../views/footer.php";
?>