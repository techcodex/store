<?php
require_once "../../init.php";
require_once "../../models/Product.php";
require_once "views/header.php";
$obj_user = unserialize($_SESSION['obj_user']);
?>
<table class="table table-striped">
    <thead>
        <tr>
            <td>Sr.No</td>
            <td>Product Name</td>
            <td>Features</td>
            <td>Description</td>
            <td>Price</td>
            <td>Quantity</td>
        </tr>
    </thead>
    <?php
        $i=1;
        $products = Product::userProducts($obj_user->user_id);
        foreach($products as $product) {
            echo("<tr>");
            echo("<td>".$i++."</td>");
            echo("<td>".$product->product_name."</td>");
            if($product->features == "") {
                echo("<td>N/A</td>");
            } else {
                echo("<td>".$product->name."</td>");
            }
            if($product->description == "") {
                echo("<td>N/A</td>");
            } else {
                echo("<td>".$product->description."</td>");
            }
            echo("<td>".$product->price."</td>");
            echo("<td>".$product->quantity."</td>");
            echo("</tr>");
        }
    ?>
</table>
<?php
require_once "views/footer.php";
?>