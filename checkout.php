<?php
require_once "models/User.php";
require_once "views/header.php";
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
                                    <li>
                                        <a href="#billing-info" data-toggle="tab">
                                            2. Billing Info
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#payment" data-toggle="tab">
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
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0);">
                                                                <img width="60px" src="img/products/men_06.jpg" alt="product">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <h6 class="regular"><a href="javascript:void(0);">Lorem Ipsum</a></h6>
                                                            <p>Sed aliquam tincidunt tempus</p>
                                                        </td>
                                                        <td>
                                                            <span>$59.99</span>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="select">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span class="text-primary">$59.99</span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="close">×</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0);">
                                                                <img width="60px" src="img/products/shoes_01.jpg" alt="product">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <h6 class="regular"><a href="javascript:void(0);">Lorem Ipsum</a></h6>
                                                            <p>Sed aliquam tincidunt tempus</p>
                                                        </td>
                                                        <td>
                                                            <span>$39.99</span>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="select">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span class="text-primary">$39.99</span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="close">×</button>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0);">
                                                                <img width="60px" src="img/products/bags_07.jpg" alt="product">
                                                            </a>
                                                        </td>
                                                        <td>
                                                            <h6 class="regular"><a href="javascript:void(0);">Lorem Ipsum</a></h6>
                                                            <p>Sed aliquam tincidunt tempus</p>
                                                        </td>
                                                        <td>
                                                            <span>$29.99</span>
                                                        </td>
                                                        <td>
                                                            <select class="form-control" name="select">
                                                                <option>1</option>
                                                                <option>2</option>
                                                                <option>3</option>
                                                                <option>4</option>
                                                                <option>5</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span class="text-primary">$29.99</span>
                                                        </td>
                                                        <td>
                                                            <button type="button" class="close">×</button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table><!-- end table -->
                                        </div><!-- end table-responsive -->
                                    </div><!-- end tab-pane -->
                                    <div class="tab-pane" id="billing-info">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="thin subtitle">Billing Address</h5>
                                                <div class="form-group input-group-lg">
                                                    <select class="form-control"></select>
                                                </div><!-- end form-group -->
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <input id="name" type="text" placeholder="First Name" name="firstname" class="form-control input-md required">
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
                                                    </div>
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
                                            </div><!-- end col -->

                                            <div class="col-md-6">
                                                <h5 class="thin subtitle">Shipping Address</h5>
                                                <div class="form-group">
                                                    <div class="checkbox-input checkbox-primary" data-toggle="collapse" data-target=".shipto">
                                                        <input id="ship-to-billing-address" class="styled" type="checkbox" checked>
                                                        <label for="ship-to-billing-address">
                                                            Ship to billing address?
                                                        </label>
                                                    </div><!-- end checkbox-input -->
                                                </div><!-- end form-group -->

                                                <div class="shipto collapse">
                                                    <div class="form-group input-group-lg">
                                                        <select class="form-control">

                                                        </select>
                                                    </div><!-- end form-group -->
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <input id="name" type="text" placeholder="First Name" name="firstname" class="form-control input-md required">
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
                                                    <textarea rows="6" class="form-control" placeholder="Notes about yout order"></textarea>
                                                </div><!-- end form-group -->
                                            </div><!-- end col -->
                                        </div><!-- end row -->
                                    </div><!-- end tab-pane -->
                                    <div class="tab-pane" id="payment">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h5 class="thin subtitle">Choose a Payment Method</h5>
                                                <div class="panel-group accordion style2" id="accordionPayment" role="tablist" aria-multiselectable="true">
                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingPayment1">
                                                            <h4 class="panel-title">
                                                                <a class="" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment1" aria-expanded="true" aria-controls="collapsePayment1">
                                                                    <i class="fa fa-credit-card mr-10"></i>Credit or Debit Card
                                                                </a>
                                                            </h4><!-- end panel-title -->
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapsePayment1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingPayment1">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Cardholder Name <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control required" name="cardholder" placeholder="">
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Card Number <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" class="form-control required" name="cardnumber" placeholder="">
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Payment Types <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <ul class="list list-inline">
                                                                                <li><i class="fa fa-cc-visa fa-2x"></i></li>
                                                                                <li><i class="fa fa-cc-paypal fa-2x"></i></li>
                                                                                <li class="text-primary"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                                                                <li><i class="fa fa-cc-discover fa-2x"></i></li>
                                                                            </ul>
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">Expiration Date <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <div class="row">
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="mm" placeholder="MM" class="form-control required">
                                                                                </div><!-- end col -->
                                                                                <div class="col-sm-6">
                                                                                    <input type="text" name="yy" placeholder="YY" class="form-control required">
                                                                                </div><!-- end col -->
                                                                            </div><!-- end row -->      
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <label class="col-sm-4">CSC <span class="text-danger">*</span></label>
                                                                        <div class="col-sm-8">
                                                                            <input type="text" name="number" placeholder="" class="form-control mb-10 required">
                                                                            <a href="javascript:void(0);">What's this?</a>
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-offset-4 col-sm-8">
                                                                            <div class="checkbox-input checkbox-primary mb-10">
                                                                                <input id="save-my-card" class="styled" type="checkbox">
                                                                                <label for="save-my-card">
                                                                                    Save my Card information?
                                                                                </label>
                                                                            </div><!-- end checkbox-input -->
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-sm-offset-4 col-sm-8 text-right">
                                                                            <a href="order-confirmation.html" class="btn btn-default btn-md round">Order <i class="fa fa-arrow-circle-right ml-5"></i></a>
                                                                        </div><!-- end col -->
                                                                    </div><!-- end row -->
                                                                </div><!-- end form-group -->
                                                            </div><!-- end panel-body -->
                                                        </div><!-- end collapse -->
                                                    </div><!-- end panel -->

                                                    <div class="panel panel-default">
                                                        <div class="panel-heading" role="tab" id="headingPayment2">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" data-toggle="collapse" data-parent="#accordionPayment" href="#collapsePayment2" aria-expanded="false" aria-controls="collapsePayment2">
                                                                    <i class="fa fa-paypal mr-10"></i>Pay with PayPal
                                                                </a>
                                                            </h4>
                                                        </div><!-- end panel-heading -->
                                                        <div id="collapsePayment2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingPayment2">
                                                            <div class="panel-body">
                                                                <div class="form-group">
                                                                    <div class="checkbox-input checkbox-primary mb-10">
                                                                        <input id="pay-with-paypal" class="styled" type="checkbox">
                                                                        <label for="pay-with-paypal">
                                                                            <i class="fa fa-cc-paypal mr-5"></i>Checkout with paypal
                                                                        </label>
                                                                    </div><!-- end checkbox-input -->
                                                                </div><!-- end form-group -->
                                                                <div class="form-group">
                                                                    <a href="order-confirmation.html" class="btn btn-default btn-md round">Order <i class="fa fa-arrow-circle-right ml-5"></i></a>
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
                                                    <td>$ 98,00</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping and Handling</th>
                                                    <td>Free Shipping</td>
                                                </tr>
                                                <tr>
                                                    <th>Order Total</th>
                                                    <td>$ 98,00</td>
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
require_once "views/footer.php";
?>