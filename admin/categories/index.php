<?php
require_once "../../models/Admin.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
require_once "../../models/Category.php";
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Categories List</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Caetgory Name</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        $categories = Category::getCategories();
                        foreach($categories as $category){
                            echo("<tr>");

                            echo("<td>".$i++."</td>");
                            echo("<td>".$category->name."</td>");
                            echo('<td>
                            <a href="'.BASE_URL.'categories/edit.php?id='.$category->id.'">
                                <i class="fa fa-edit" style="color:blue;"></i>
                            </a>
                            <a href="'.BASE_URL.'categories/process/process_delete_category.php?id='.$category->id.'">
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