<?php
require_once "../../models/User.php";
require_once "../../models/Admin.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Users List</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>F.Name</th>
                            <th>User Name</th>
                            <th>L.Name</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                            $users = User::show_all_users();
                            foreach($users as $user) {
                                echo("<tr>");
                                echo("<td>".$i."</td>");
                                if($user->first_name == "") {
                                    echo("<td>N/A</td>");
                                } else {
                                    echo("<td>".$user->first_name."</td>");
                                }
                                echo("<td>".$user->user_name."</td>");
                                if($user->last_name == "") {
                                    echo("<td>N/A</td>");
                                } else {
                                    echo("<td>".$user->last_name."</td>");
                                }
                                echo("<td>".$user->email."</td>");
                                if($user->status == 1) {
                                    echo("<td><a href='".BASE_URL."users/process/process_deactive.php?id=".$user->user_id."' class='btn btn-sm btn-danger'>Deactive</a></td>");
                                } else {
                                    echo("<td><a href='".BASE_URL."users/process/process_active.php?id=".$user->user_id."' class='btn btn-sm btn-success'>Active</a></td>");
                                }
                                echo("<td><a href='".BASE_URL."users/edit.php?id=".$user->user_id."'><i class='fa fa-edit'></i></a></td>");
                                echo("</tr>");
                                $i++;
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
<script>
    $(document).ready(function(e) {
        $("#example").dataTable();
    });
</script>