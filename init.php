<?php
session_start();
define("BASE_FOLDER","/");
define("BASE_URL","http://".$_SERVER['HTTP_HOST'].BASE_FOLDER);
require_once "models/User.php";
?>