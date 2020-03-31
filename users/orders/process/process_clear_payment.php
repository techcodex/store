<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../../../init.php";
    require_once "../../../models/Order.php";
    require_once "../../../models/User.php";
    require_once "../../../models/OrderRating.php";
    $obj_rating = new OrderRating();
    $response = [];
    $errors = [];
    try{
        $obj_rating->order_id = $_POST['id'];
    } catch(Exception $ex) {
        $errors['id'] = $ex->getMessage();
    }
    try{
        $obj_rating->feedback = $_POST['feedback'];
    } catch(Exception $ex) {
        $errors['feedback'] = $ex->getMessage();
    }
    try{
        $obj_rating->rating = $_POST['rating'];
    } catch(Exception $ex) {
        $errors['rating'] = $ex->getMessage();
    }
    if(count($errors) == 0) {
        try{
            $obj_rating->add();
            $user_id = Order::confirmOrder($_POST['id']);
            User::makeRating($user_id,$_POST['rating']);        
            $response['success'] = true;
        } catch(Exception $ex) {
            $response['error'] = $ex->getMessage();
        }
    } else {
        $response['error'] = "Fill all Required Fields";
        $response['errors'] = $errors;
    }
    
    echo(json_encode($response));
}
?>