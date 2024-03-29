<?php
require_once "../../models/Admin.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
require_once "../../models/Brand.php";
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
                    <?php
                        $i = 1;
                        $brands = Brand::getBrands();
                        foreach($brands as $brand){
                            echo("<tr>");
                            echo("<td>".$i++."</td>");
                            echo("<td>".$brand->name."</td>");
                            echo('<td>
                            <img src="'.WEB_BASE_URL.'../img/brands/'.$brand->image.'" alt="img" width="50">
                            </td>');
                            echo('<td>
                            <a href="'.BASE_URL.'brands/edit.php?id='.$brand->id.'">
                                <i class="fa fa-edit" style="color:blue;"></i>
                            </a>
                            <a href="'.BASE_URL.'brands/process/process_delete_brand.php?id='.$brand->id.'">
                                <i class="fa fa-trash" style="color:red;"></i>
                            </a>
                        </td>');
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
require_once "../views/footer.php"
?>