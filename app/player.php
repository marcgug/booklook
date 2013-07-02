<?php
//player.php
// given a category (l1), this will show random books to the user in that category, allowing
// them to browse through as many as they want

// basically: find content of a book in the category, display it..

$CATEGORIES_ARRAY = array (
	"picks" => "Critic's Picks",
	"fiction" => "Fiction & Literature",
	"mystery" => "Mystery & Thriller",
	"romance" => "Romance"
	);
?>



<div class="navbar">

	<ul class="breadcrumb">

	  <li><a href="index.php?page=start">Discover</a> <span class="divider">/</span></li>
	  <li class="active"><?=$CATEGORIES_ARRAY[$_GET["l1"]]?></li>
	</ul>

</div>

<ul class="thumbnails">
  <li class="span4">
    <div class="thumbnail">
      <img data-src="js/holder.js/300x200" alt="">
      <h3>Thumbnail label</h3>
      <p>Thumbnail caption...</p>
    </div>
  </li>
</ul>




<p>Player</p>