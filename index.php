<?php
// track execution time
$time_start = microtime(true);

// include config settings
require("app/config.php");

// show header
require_once("app/header.php");

// decide which main page to show
if($_GET["page"] == "view_content")
	require_once("app/view_content.php");
else
	require_once("app/list.php");
	
// show footer
require_once("app/footer.php");

?>
    
