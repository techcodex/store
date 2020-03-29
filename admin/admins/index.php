<?php
require_once "../../models/Admin.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Admins List</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>User Name</th>
                            <th>Email</th>
                            <th>Image</th>
                            <th>Satus</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        $admins = Admin::getAdmins();
                        foreach($admins as $admin){
                            echo("<tr>");
                            echo("<td>".$i++."</td>");
                            echo("<td>".$admin->user_name."</td>");
                            echo("<td>".$admin->email."</td>");
                            echo('<td>
                            <img src="'.WEB_BASE_URL.'../img/admin/'.$admin->image.'" alt="img" width="50">
                            </td>');
                            if($admin->status){
                                echo("<td><a class='btn btn-danger btn-sm' href='". BASE_URL ."admins/process/process_deactive_admin.php?id=".$admin->id."'>Deactive</a></td>");
                            }else{
                                echo("<td><a class='btn btn-primary btn-sm' href='". BASE_URL ."admins/process/process_active_admin.php?id=".$admin->id."'>Active</a></td>");
                            }
                            echo('<td>
                            <a href="'.BASE_URL.'admins/edit.php?id='.$admin->id.'">
                                <i class="fa fa-edit" style="color:blue;"></i>
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