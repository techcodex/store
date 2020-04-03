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
$obj_user = unserialize($_SESSION['obj_user']);
?>
<div class="row" style="font-size:15px;">
        <div class="form-group row">
            <div class="col-md-2">
                <label for="report">Report</label>
            </div>
            <div class="col-md-10">
                <select class="form-control" id="report">
                    <option value="" >--Select Report--</option>
                    <option value="1">1. Daily Order Report</option>
                    <option value="2">2. Weekly Order Report</option>
                    <option value="3">3. Monhtly Order Report</option>
                    <option value="4">4. Yearly Order Report</option>
                    <option value="5">5. Stock Report</option>
                    <option value="6">6. Product Order Report</option>
                    <option value="7">7. Disputed Order Report</option>
                </select>
            </div>
        </div>
        <div class="form-group data">

        </div>
</div>
<?php
require_once "../views/footer.php";
require_once "../../views/footer.php";
?>
<script>
$(document).ready(function(e) {
    $("#report").change(function(e) {
        var val = $(this).val();
        if(val == 1) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>users/reports/daily_report.php' method='post'>";
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 2) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>users/reports/order_report.php' method='post'>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>From Date</label>";
            output += "<div class='col-md-10'>";
            output += "<input type='date' class='form-control date weekly_from_date' name='from_date' readonly style='margin-top:10px;'>"
            output += "</div>";
            output += "</div>"
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>To Date</label>";
            output += "<div class='col-md-10'>";
            output += "<input type='date' class='form-control date weekly_to_date' name='to_date' readonly style='margin-top:10px;'>"
            output += "</div>";
            output += "</div>"
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 3) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>users/reports/order_report.php' method='post'>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>From Date</label>";
            output += "<div class='col-md-10'>";
            output += "<input type='date' class='form-control date monthly_from_date' name='from_date' readonly style='margin-top:10px;'>"
            output += "</div>";
            output += "</div>"
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>To Date</label>";
            output += "<div class='col-md-10'>";
            output += "<input type='date' class='form-control date monthly_to_date' name='to_date' readonly style='margin-top:10px;'>"
            output += "</div>";
            output += "</div>"
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 4) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>users/reports/order_report.php' method='post'>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>From Date</label>";
            output += "<div class='col-md-10'>";
            output += "<input type='date' class='form-control date weekly_from_date' name='from_date' style='margin-top:10px;'>"
            output += "</div>";
            output += "</div>"
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>To Date</label>";
            output += "<div class='col-md-10'>";
            output += "<input type='date' class='form-control date weekly_to_date' name='to_date' style='margin-top:10px;'>"
            output += "</div>";
            output += "</div>"
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 5) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>users/reports/product_stock_report.php' method='post'>";
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 6) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>users/reports/product_order_report.php' method='post'>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>Select Product</label>";
            output += "<div class='col-md-10'>";
            output += "<select class='form-control' style='margin-top:10px;' name='product_id'>";
            output += "<option value=''>--Select Product--</option>";
            output += "<?php $products = Product::userProducts($obj_user->user_id); foreach($products as $product) { echo("<option value='".$product->product_id."'>".$product->product_name."</option>"); } ?> ";
            output += "</select>";
            output += "</div>";
            output += "</div>";
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 7) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>users/reports/disputed_order_report.php' method='post'>";
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        }
    });
        //monthly dates
        var date = new Date();
    var month = date.getMonth();
    var fullDate = date.getDate();

    if(month < 13)
        month =  month+1;
    var fromMonth = month-1;

    if(month < 10) {
        fromMonth = '0' + fromMonth;
        month = '0' + month;
    }

    if(fullDate < 10) {
        fullDate = '0' + fullDate;
    }
    $(document).on('change','#report',function (e) {
        $(".monthly_to_date").val(date.getFullYear() + "-" + month + "-" + fullDate);
        $(".monthly_from_date").val(date.getFullYear() + "-" + fromMonth + "-" + fullDate);
    });

    //weekly dates
    var days = 7; // Days you want to subtract
    var date = new Date();
    var last = new Date(date.getTime() - (days * 24 * 60 * 60 * 1000));
    var day =last.getDate();
    var m =last.getMonth()+1;
    if(m < 10)
        m = '0'+ m;
    if(day < 10)
        day = '0' + day;
    var year=last.getFullYear();

    $(document).on('change','#report',function (e) {
        $(".weekly_from_date").val(year + "-" + m + "-" + day);
        $(".weekly_to_date").val(date.getFullYear() + "-" + month + "-" + fullDate);
    });

});
</script>