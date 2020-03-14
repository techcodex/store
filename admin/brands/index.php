<?php
require_once "../../models/Admin.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Brands List</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Brand Name</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Gucci</td>
                            <td>
                                <img src="<?php echo(BASE_URL); ?>../img/brands/brand_01.jpg" alt="img" width="50">
                            </td>
                            <td>
                                <a href="">
                                    <i class="fa fa-eye" style="color:green;"></i>
                                </a>
                                <a href="">
                                    <i class="fa fa-edit" style="color:blue;"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Gucci</td>
                            <td>
                                <img src="<?php echo(BASE_URL); ?>../img/brands/brand_01.jpg" alt="img" width="50">
                            </td>
                            <td>
                                <a href="">
                                    <i class="fa fa-eye" style="color:green;"></i>
                                </a>
                                <a href="">
                                    <i class="fa fa-edit" style="color:blue;"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Gucci</td>
                            <td>
                                <img src="<?php echo(BASE_URL); ?>../img/brands/brand_01.jpg" alt="img" width="50">
                            </td>
                            <td>
                                <a href="">
                                    <i class="fa fa-eye" style="color:green;"></i>
                                </a>
                                <a href="">
                                    <i class="fa fa-edit" style="color:blue;"></i>
                                </a>
                            </td>
                        </tr>

                        <tr>
                            <td>1</td>
                            <td>Gucci</td>
                            <td>
                                <img src="<?php echo(BASE_URL); ?>../img/brands/brand_01.jpg" alt="img" width="50">
                            </td>
                            <td>
                                <a href="">
                                    <i class="fa fa-eye" style="color:green;"></i>
                                </a>
                                <a href="">
                                    <i class="fa fa-edit" style="color:blue;"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Gucci</td>
                            <td>
                                <img src="<?php echo(BASE_URL); ?>../img/brands/brand_01.jpg" alt="img" width="50">
                            </td>
                            <td>
                                <a href="">
                                    <i class="fa fa-eye" style="color:green;"></i>
                                </a>
                                <a href="">
                                    <i class="fa fa-edit" style="color:blue;"></i>
                                </a>
                            </td>
                        </tr>

                    </tbody>
                    </table>  
                </div>
            </div>
        </div>
    </div>
</div><!-- Row -->
<?php
require_once "../views/footer.php"
?>