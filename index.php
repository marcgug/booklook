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
else if($_GET["page"] == "list")
	require_once("app/list.php");
else if ($_GET["page"] == "player")
	require_once("app/player.php");
else if ($_GET["page"] == "reveal")
	require_once("app/reveal.php");
else
	require_once("app/start.php");
	
// show footer
require_once("app/footer.php");

?>
    
