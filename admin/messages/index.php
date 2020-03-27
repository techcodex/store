<?php
require_once "../../models/Admin.php";
require_once "../views/header.php";
require_once "../views/sidebar.php";
require_once "../../models/Message.php";
?>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">Messages List</h4>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                <table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $i = 1;
                        $messages = Message::getMessages();
                        foreach($messages as $message){
                            echo("<tr>");
                            echo("<td>".$i++."</td>");
                            echo("<td>".$message->name."</td>");
                            echo("<td>".$message->email."</td>");
                            echo("<td>".$message->message."</td>");
                            echo('<td>
                            <a href="'.BASE_URL.'messages/process/process_delete_message.php?id='.$message->id.'">
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