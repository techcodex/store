<?php
// echo("<pre>");
// print_r($_POST);
// echo("</pre>");
// die;
if($_SERVER['REQUEST_METHOD'] == "POST") {
    require_once "../../init.php";
    require_once "../../models/Location.php";
    $actions = $_POST['action'];
    $response = [];
    switch($actions) {
        case 'get_states': {
            $country_id = $_POST['id'];
            try {
                $states = Location::getStates($country_id);
                $response['success'] = true;
                $response['states'] = $states;
            } catch(Exception $ex) {
                $response['error'] = true;
                $response['msg'] = $ex->getMessage();
            }
            break;
        }
            
        case 'get_cities': 
        {
            try {
                $id = $_POST['id'];
                $cities = Location::getCities($id);
                $response['success'] = true;
                $response['cities'] = $cities;
            } catch(Exception $ex) {
                $response['error'] = true;
                $response['msg'] = $ex->getMessage();
            }
            break;
        }
        default: {
            $response['error'] = true;
            $response['msg'] = "Invalid Action";
        }
    }
    echo(json_encode($response));
}
?>