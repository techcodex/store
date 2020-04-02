<?php
session_start();
define("BASE_FOLDER","/admin/");
define("BASE_URL","http://".$_SERVER['HTTP_HOST'].BASE_FOLDER);

define("WEB_BASE_FOLDER","/");
define("WEB_BASE_URL","http://".$_SERVER['HTTP_HOST'].WEB_BASE_FOLDER);

?>