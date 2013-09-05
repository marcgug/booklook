<?
// header.php

?>
<!DOCTYPE html>
<html>
  <head>
    <title>BookLook Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <script src="js/holder.js"></script>
    <script type="text/javascript">
    var i = 1;
    var max = <?=$MAX_PARAS?>;
	function readmore(){
		if(i < max)
		{
			document.getElementById(i).style.display = "block";
			i++;	
		}
		
		if(i == max)
		{
			document.getElementById("readmorebutton").innerHTML = "Reveal it!";
		}
	}
	</script>
  </head>
  <body>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
    	<!-- sidebar content -->
		<h1>Book Look</h1>
    	<p class="lead">Discover something great!</p>
    	<ul class="nav nav-pills nav-stacked">
    		<!-- <li <?php if($_GET["page"] == "list") echo " class=\"active\"";?>><a href="index.php?page=list">Show me some books</a></li> -->
    		<li <?php if($_GET["page"] == "start" or !isset($_GET["page"])) echo " class=\"active\"";?>><a href="index.php?page=start">Help me discover a book</a></li>
    	</ul>
    	<form action="index.php" method="post">
    	<input class="input-medium" type="text" name="authorname" placeholder="Search by author">
    	</form>
    </div>
    <div class="span10"><br />
    	<!-- main content -->