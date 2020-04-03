<?php
require_once "../../models/Admin.php";
require_once "../../models/User.php";
require_once "../../models/Product.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";

?>
<div class="row">
    <div class="panel panel-white">
        <div class="panel-heading text-center">
            <h3 class="panel-title" style="font-size: 15px;"> 
            <span class="fa fa-line-chart"></span>
             Reports / Admin Reports</h3>
            <hr>
        </div>
        <div class="panel-body">
                <?php
                if(isset($_SESSION['error'])) {
                    echo("<div class='alert alert-danger alert-dismissible'>");
                    echo("<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>");
                    echo("<strong>Error !</strong> ".$_SESSION['error']);
                    echo("</div>");
                    unset($_SESSION['error']);
                }
                ?>
                <div class="form-group <?php if(isset($errors['user_name'])) {echo("has-error");} ?>">
                    <label for="input-rounded" class="col-sm-2 control-label">Report Type</label>
                    <div class="col-sm-10">
                        <select class="form-control" id="report">
                            <option value="0">--Select Report--</option>
                            <option value="1">1. Users Report</option>
                            <option value="2">2. Product Stock Report</option>
                            <option value="3">3. Daily Order Report</option>
                            <option value="4">4. User Order Report</option>
                            <option value="5">5. Monthly Order Report</option>
                            <option value="6">6. Weekly Order Report</option>
                            <option value="7">7. Yearly Order Report</option>
                            <option value="8">8. Product Monthly Report</option>
                            <option value="9">9. Product Weekly Report</option>
                            <option value="10">10. Product Yearly Report</option>
                            <option value="11">11. Disputed Orders Report</option>
                        </select>
                    </div>
                    <div class="data">

                    </div>
                </div>
        </div>
    </div>
</div>
<?php
require_once "../views/footer.php";
?>
<script>
$(document).ready(function(e) {
    $("#report").change(function(e) {
        var val = $(this).val();
        if(val == 1) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>reports/user_report.php' method='post'>";
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 2) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>reports/product_stock_report.php' method='post'>";
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 3) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>reports/order_daily_report.php' method='post'>";
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 4) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>reports/user_order_report.php' method='post'>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>Select User</label>";
            output += "<div class='col-md-10'>";
            output += "<select class='form-control' style='margin-top:10px;' name='user_id'>";
            output += "<option value=''>--Select User--</option>";
            output += "<?php $users = User::show_all_users(); foreach($users as $user) { echo("<option value='".$user->user_id."'>".$user->user_name."</option>"); } ?> ";
            output += "</select>";
            output += "</div>";
            output += "</div>"
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 5) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>reports/order_date_report.php' method='post'>";
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
        } else if(val == 6) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>reports/order_date_report.php' method='post'>";
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
        } else if(val == 7) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>reports/order_date_report.php' method='post'>";
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
        } else if(val == 8) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>reports/product_date_report.php' method='post'>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>Select Product</label>";
            output += "<div class='col-md-10'>";
            output += "<select class='form-control' style='margin-top:10px;' name='product_id'>";
            output += "<option value=''>--Select Product--</option>";
            output += "<?php $products = Product::showAllProductsAdmin(); foreach($products as $product) { echo("<option value='".$product->product_id."'>".$product->product_name."</option>"); } ?> ";
            output += "</select>";
            output += "</div>";
            output += "</div>";
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
            output += "</div>";
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 9) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>reports/product_date_report.php' method='post'>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>Select Product</label>";
            output += "<div class='col-md-10'>";
            output += "<select class='form-control' style='margin-top:10px;' name='product_id'>";
            output += "<option value=''>--Select Product--</option>";
            output += "<?php $products = Product::showAllProductsAdmin(); foreach($products as $product) { echo("<option value='".$product->product_id."'>".$product->product_name."</option>"); } ?> ";
            output += "</select>";
            output += "</div>";
            output += "</div>";
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
            output += "</div>";
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 10) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>reports/product_date_report.php' method='post'>";
            output += "<div class='form-group' >";
            output += "<label for='input-rounded' class='col-sm-2 control-label'>Select Product</label>";
            output += "<div class='col-md-10'>";
            output += "<select class='form-control' style='margin-top:10px;' name='product_id'>";
            output += "<option value=''>--Select Product--</option>";
            output += "<?php $products = Product::showAllProductsAdmin(); foreach($products as $product) { echo("<option value='".$product->product_id."'>".$product->product_name."</option>"); } ?> ";
            output += "</select>";
            output += "</div>";
            output += "</div>";
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
            output += "</div>";
            output +="<input type='submit' value='Check Report' class='btn btn-danger col-md-offset-5' style='margin-top:10px;'>";
            output +="</form>";
            $(".data").html(output);
        } else if(val == 11) {
            var output = "";
            output += "<form action='<?php echo(BASE_URL); ?>reports/disputed_orders_report.php' method='post'>";
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