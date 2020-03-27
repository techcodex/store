<?php

if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])) {
    require_once "../../init.php";
    require_once "../../../models/Message.php";

    try{
        Message::deleteMessage($_GET['id']);
        $_SESSION['success'] = "Message Deleted Successfully";
    } catch(Exception $ex) {
        $_SESSION['error'] = $ex->getMessage();
    }
    header("Location:".BASE_URL."messages/index.php");
}

?>