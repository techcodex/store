<?php
require_once "../models/User.php";
require_once "../models/Cart.php";
require_once "../models/Wishlist.php";
require_once "../models/Category.php";
require_once "../views/header.php";
$obj_user->profile();
?>
<!-- start section -->
<section class="section white-backgorund">
            <div class="container">
                <div class="row">
                    <!-- start sidebar -->
                    <!-- end sidebar -->
                    <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12 text-left">
                                <h2 class="title">Checkout</h2>
                            </div><!-- end col -->
                        </div><!-- end row -->
                        
                        <hr class="spacer-5"><hr class="spacer-20 no-border">
                        
                        <div class="row">
                            <div class="col-sm-12">
                                <ul class="nav nav-pills style2 nav-justified">
                                    <li class="active">
                                        <a href="#shopping-cart" data-toggle="tab">
                                            1. Shopping Cart
                                            <div class="icon">
                                                <i class="fa fa-check"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#billing-info" id="billingTab" data-toggle="tab">
                                            2. Billing Info
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#payment" data-toggle="tab" id="paymentTab">
                                            3. Payment
                                            <div class="icon">
                                                <i class="fa fa-credit-card"></i>
                                            </div>
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content pills">
                                    <div class="tab-pane active" id="shopping-cart">
                                        <div class="table-responsive">    
                                            <form action="<?php echo(BASE_URL); ?>products/process/process_checkout_cart.php" method="post">
                                                <input type="hidden" name="action" value="update_cart">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th colspan="2">Products</th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th colspan="2">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            $items =  $obj_cart->items;
                                                            if(count($items) == 0) {
                                                                echo('<tr><td colspan="5" class="text-center text-danger"> <b> Oppss Your Cart is Empty</b> </td></tr>');
                                                            } else {
                                                                foreach($items as $item) {
                                                                    echo('<tr>');
                                                                    echo('<td>');
                                                                    echo('<a href="'.BASE_URL.'products/product.php?id='.$item->item_id.'">');
                                                                    echo('<img width="60px" src="'.BASE_URL.$item->image.'" alt="product">');
                                                                    echo('</a>');
                                                                    echo('</td>');
                                                                    echo('<td>');
                                                                    echo('<h6 class="regular"><a href="'.BASE_URL.'products/product.php?id='.$item->item_id.'">'.ucfirst($item->item_name).'</a></h6>');
                                                                    if($item->item_description == "") {
                                                                        echo('<p>N/A</p>');
                                                                    } else {
                                                                        echo("<p>".$item->item_description."</p>");
                                                                    }
                                                                    echo('</td>');
                                                                    echo('<td><span>$'.$item->unit_price.'</span></td>');
                                                                    echo('<td><input type="number" class="form-control" name="qtys['.$item->item_id.']" value="'.$item->quantity.'"></td>');
                                                                    echo('<td>');
                                                                    echo('<span class="text-primary">$'.$item->unit_price * $item->quantity.'</span>');
                                                                    echo('</td>');
                                                                    echo('<td>');
                                                                    echo('<a href="'.BASE_URL.'products/process/process_cart.php?product_id='.$item->item_id.'&action=remove_item" style="color:red;"><i class="fa fa-trash"></i></button>');
                                                                    echo('</td>');
                                                                    echo('</tr>');
                                                                }
                                                            }
                                                        ?>
                                                    </tbody>
                                                    <tfoot>
                                                        <tr>
                                                            <td>
                                                            <a href="<?php echo(BASE_URL); ?>products/index.php" class="btn btn-light semi-circle btn-md pull-left">
                                                                <i class="fa fa-arrow-left mr-5"></i> Continue shopping
                                                            </a>
                                                            </td>
                                                            <td></td>
                                                            <td></td>
                                                            <td><center><input type="submit" value="Update" class="btn btn-primary semi-circle btn-md"></center></td>
                                                            <td colspan="2">
                                                                <center><a href="<?php echo(BASE_URL); ?>products/process/process_checkout_cart.php?action=empty_cart" class="btn btn-danger semi-circle btn-sm">Empty Cart</a></center>
                                                            </td>
                                                        </tr>
                                                    </tfoot>
                                                </table><!-- end table -->
                                            </form>
                                        </div><!-- end table-responsive -->
                                    </div><!-- end tab-pane -->
                                    <div class="tab-pane" id="billing-info">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="thin subtitle">Billing Address</h5>
                                                
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input id="firstname" type="text" placeholder="First Name" value="<?php echo($obj_user->first_name); ?>" name="firstname" class="form-control input-md">
                                                        </div><!-- end form-group -->
                                                        <div class="form-group">
                                                            <input id="email" type="text" placeholder="Email" name="email" class="form-control input-md" value="<?php echo($obj_user->email); ?>">
                                                        </div><!-- end form-group -->
                                                    </div><!-- end col -->
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input id="lastname" type="text" placeholder="Last Name" name="lastname" class="form-control input-md" value="<?php echo($obj_user->last_name); ?>">
                                                        </div><!-- end form-group -->
                                                        <div class="form-group">
                                                            <input id="contact_no" type="tel" placeholder="Phone" name="phone" class="form-control input-md required" value="<?php echo($obj_user->contact_no); ?>">
                                                        </div><!-- end form-group -->
                                                    </div>
                                                </div><!-- end row -->
                                                <div class="form-group">
                                                    <textarea class="form-control" id="address" placeholder="Enter Shipping Address" name="address"><?php echo($obj_user->street_address); ?></textarea>
                                                </div><!-- end form-group -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input id="zip" type="text" placeholder="Zip/Postal Code" name="zip" class="form-control input-md required">
                                                        </div><!-- end form-group -->
                                                    </div><!-- end col -->
                                                </div><!-- end row -->
                                            </div><!-- end col -->

                                            <div class="col-md-6">
                                                <h5 class="thin subtitle">Shipping Address</h5>

                                                <div class="shipto collapse">
                                                    <div class="form-group input-group-lg">
                                                        
                                                    </div><!-- end form-group -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input id="name" type="text" placeholder="First Name" name="firstname" class="form-control input-md ">
                                                            </div><!-- end form-group -->
                                                            <div class="form-group">
                                                                <input id="email" type="text" placeholder="Email" name="email" class="form-control input-md required email">
                                                            </div><!-- end form-group -->
                                                        </div><!-- end col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input id="surname" type="text" placeholder="Last Name" name="lastname" class="form-control input-md required">
                                                            </div><!-- end form-group -->
                                                            <div class="form-group">
                                                                <input id="phone" type="tel" placeholder="Phone" name="phone" class="form-control input-md required">
                                                            </div><!-- end form-group -->
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                    <div class="form-group">
                                                        <input id="billingAddress" type="text" placeholder="Address Line 1" name="address1" class="form-control input-md required">
                                                    </div><!-- end form-group -->
                                                    <div class="form-group">
                                                        <input id="billingAddress2" type="text" placeholder="Address Line 2" name="address2" class="form-control input-md required">
                                                    </div><!-- end form-group -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input id="city" type="text" placeholder="City" name="city" class="form-control input-md required">
                                                            </div><!-- end form-group -->
                                                        </div><!-- end col -->
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input id="zip" type="text" placeholder="Zip/Postal Code" name="zip" class="form-control input-md required">
                                                            </div><!-- end form-group -->
                                                        </div><!-- end col -->
                                                    </div><!-- end row -->
                                                </div><!-- end collapse -->    
                                                <div class="form-group">
                                                    <textarea rows="6" class="form-control" id="notes" placeholder="Notes about yout order"></textarea>
                                                </div><!-- end form-group -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end tab-pane -->
                                    <div class="tab-pane" id="payment">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="text-danger" style="" id="errors"></div>
                                                <h5 class="thin subtitle">Pay to Confirm your Order</h5>
                                                <div class="panel-group accordion style2" id="accordionPayment" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingPayment1">
                                                            <h4 class="panel-title">
                                                                <a class="" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment1" aria-expanded="true" aria-controls="collapsePayment1">
                                                                    <i class="fa fa-credit-card mr-10"></i>Order Details
                                                                </a>
                                                            </h4><!-- end panel-title -->
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapsePayment1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPayment1">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Full Name </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control" readonly name="cardholder" id="fullname">
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Total Amount </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control" id="totalAmount" readonly name="amount" >
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Shipment </label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control" readonly id="shippingAmount" >
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Shiping Address </label>
                                                                        <div class="col-sm-8">
                                                                            <textarea type="text" class="form-control" id="shippingAddress" readonly name="amount" rows="7"></textarea>
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Notes </label>
                                                                        <div class="col-sm-8">
                                                                            <textarea type="text" class="form-control" id="shippingNotes" readonly name="notes" rows="7"></textarea>
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-offset-4 col-sm-8 text-right">
                                                                            <a href="#" class="btn btn-default btn-md round" id="confirm">Confirm Order <i class="fa fa-arrow-circle-right ml-5"></i></a>
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                </div><!-- end panel-group -->
                                            </div><!-- end col -->
                                            <div class="col-md-6">
                                                <h5 class="thin subtitle">Frequently asked questions</h5>
                                                <div class="panel-group accordion style1" id="question" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionOne">
                                                            <h4 class="panel-title">
                                                                <a class="" data-toggle="collapse" data-parent="#question" href="#collapseQuestionOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    What payments methods can I use?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="questionOne">
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionTwo">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Can I use gift card to pay for my purchase?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionTwo">
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="questionThree">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#question" href="#collapseQuestionThree" aria-expanded="false" aria-controls="collapseThree">
                                                                    How long will it take to get my order?
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapseQuestionThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="questionThree">
                                                            <div class="panel-body">
                                                                <p>Lorem ipsum dolor sit amet, link adipisicing elit. Dicta voluptatem, tenetur eum tempore minus libero voluptates eos doloremque. Dolore minima rem consequuntur exercitationem quaerat deleniti repellendus enim necessitatibus mollitia tenetur?</p>
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->
                                                </div><!-- end panel-group -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end tab-pane -->
                                </div><!-- end pills content -->
                        
                                <hr class="spacer-30">

                                <div class="row">
                                    <div class="col-sm-5 col-md-offset-7">
                                        <div class="table-responsive"> 
                                            <table class="table no-border">
                                                <tr>
                                                    <th>Cart Subtotal</th>
                                                    <td>$ <?php echo($obj_cart->total); ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping and Handling</th>
                                                    <td>$0.00</td>
                                                </tr>
                                                <tr>
                                                    <th>Order Total</th>
                                                    <td>$ <?php echo($obj_cart->total); ?></td>
                                                </tr>
                                            </table><!-- end table -->
                                        </div><!-- end table-responsive -->
                                    </div><!-- end col -->
                                </div><!-- end row -->
                            </div><!-- end col -->
                        </div><!-- end row -->
                    </div><!-- end col -->
                </div><!-- end row -->                
            </div><!-- end container -->
        </section>
        <!-- end section -->
<?php
require_once "../views/footer.php";
?>

<script>
document.addEventListener("DOMContentLoaded",(e)=>{
    var payment = document.getElementById("paymentTab");
    // console.log(payment);
    
    payment.addEventListener("click",(e)=>{
        var first_name = document.getElementById("firstname");
        var last_name = document.getElementById("lastname");
        var contact_no = document.getElementById("contact_no");
        var email = document.getElementById("email");
        var address = document.getElementById("address");
        var notes = document.getElementById("notes");
        var confirm = document.getElementById("confirm");
        var error = 0;
        if(first_name.value == "") {
            error++;
            first_name.parentNode.classList.add("has-error");
        } else {
            first_name.parentNode.classList.contains("has-error") ? first_name.parentNode.classList.remove("has-error") : '';
            first_name.parentNode.classList.add("has-success");
        }
        if(last_name.value == "") {
            error++;
            last_name.parentNode.classList.add("has-error");
        } else {
            last_name.parentNode.classList.contains("has-error") ? last_name.parentNode.classList.remove("has-error") : '';
            last_name.parentNode.classList.add("has-success");
        }
        if(contact_no.value == "") {
            error++;
            contact_no.parentNode.classList.add("has-error");
        } else {
            contact_no.parentNode.classList.contains("has-error") ? contact_no.parentNode.classList.remove("has-error") : '';
            contact_no.parentNode.classList.add("has-success");
        }
        if(email.value == "") {
            error++;
            email.parentNode.classList.add("has-error");
        } else {
            email.parentNode.classList.contains("has-error") ? email.parentNode.classList.remove("has-error") : '';
            email.parentNode.classList.add("has-success");
        }
        if(address.value == "") {
            error++;
            address.parentNode.classList.add("has-error");
        } else {
            address.parentNode.classList.contains("has-error") ? address.parentNode.classList.remove("has-error") : '';
            address.parentNode.classList.add("has-success");
        }
        if(error > 0) {
            toastr.error("Please Fill all Required Fields");
            var billingTab = document.getElementById("billingTab");
            
            confirm.setAttribute("disabled",true);
        } else {
            var fullname = document.getElementById("fullname");
            var totalAmount = document.getElementById("totalAmount");
            var shippingAmount = document.getElementById("shippingAmount");
            var shippingAddress = document.getElementById("shippingAddress");
            var shippingNotes = document.getElementById("shippingNotes");


            fullname.value = first_name.value+' '+last_name.value;
            totalAmount.value = "$ <?php echo($obj_cart->total); ?>";
            shippingAmount.value = "$ 0.00";
            shippingAddress.value = address.value;
            shippingNotes.value = notes.value;
            confirm.removeAttribute("disabled")
        }

    });
    $("#confirm").click((e)=>{
        var first_name = document.getElementById("firstname").value;
        var last_name = document.getElementById("lastname").value;
        var contact_no = document.getElementById("contact_no").value;
        var address = document.getElementById("address").value;
        var notes = document.getElementById("notes").value;
        var data = {
            'first_name':first_name,
            'last_name':last_name,
            'contact_no':contact_no,
            'address':address,
            'notes':notes,
        };
        $.ajax({
            url:"<?php echo(BASE_URL); ?>products/process/process_checkout.php",
            data:data,
            dataType:'JSON',
            type:'POST',
            complete:function(jqXHR,textStatus) {
                if(jqXHR.status == 200) {
                    var result = JSON.parse(jqXHR.responseText);
                    if(result.hasOwnProperty('success')) {
                        toastr.success("Order Place Successfully");
                        setTimeout(()=>{
                            window.location.replace("<?php echo(BASE_URL); ?>products/cart.php");
                        },2000)
                        
                    } else if(result.hasOwnProperty('error')) {
                        toastr.error(result.msg);
                        var errors = result.errors;
                        var output = "";
                        for(var error in errors) {
                            output += "<li class='text-danger'>"+errors['error']+"</li>";
                        }
                        $("#output").innerHTML(output);
                    } else {
                        toastr.error("Contact Admin"+jqXHR.status);
                    }
                }
            }
        });
    });
});
</script>