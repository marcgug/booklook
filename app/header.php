<?
// header.php

?>
<!DOCTYPE html>
<html>
  <head>
    <title>BookSmash Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
  </head>
  <body>
<div class="container-fluid">
  <div class="row-fluid">
    <div class="span2">
    	<!-- sidebar content -->
		<h1>Book Smash</h1>
    	<p class="lead">Smash up some books yo.</p>
    	<ul class="nav nav-pills nav-stacked">
    		<li <?php if(!isset($_POST["search_text"]) & !isset($_GET["page"])) echo " class=\"active\"";?>><a href="index.php">Home</a></li>
    	</ul>
    	<form action="index.php" method="post">
    	<input class="input-medium" type="text" name="authorname" placeholder="Search by author">
    	</form>
    </div>
    <div class="span10"><br />
    	<!-- main content -->