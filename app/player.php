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
	
$genre = $_GET["l1"];

// get a random ISBN from the appropriate array
$isbn = $ISBNS[$genre][array_rand($ISBNS[$genre])];

echo $isbn;

// get some content for this book
// make the api call to get content

// 1. init curl
$ch = curl_init("http://diner.harpercollins.com/api/content/epubFetch?apiname=EpubView&isbn=".$isbn."&apikey=".$CONTENT_API_KEY."");

// 2. don't include header, don't print to stdout
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// 3. execute
$curl_result = curl_exec($ch);

// 4. decode
//$result = json_decode($curl_result, true);

// 5. close curl
curl_close($ch);

$content = strip_tags($curl_result, "<p>");

$paragraphs = array();

// start at a paragraph at least 500 chars in - to avoid headings, etc
$start = strpos($content, "<p", 500);

for($i = 0; $i < $MAX_PARAS; $i++)
{
	$end = strpos($content, "</p", $start);
	$length = $end - $start + 4;
	$paragraphs[$i] = strip_tags(substr($content, $start, $length));
	$start = $end + 4;
}




?>



<div class="navbar">

	<ul class="breadcrumb">

	  <li><a href="index.php?page=start">Change genre</a></li>
	  <!-- <li class="active"><?=$CATEGORIES_ARRAY[$_GET["l1"]]?></li> -->
	</ul>

</div>



<div class="row">

	<div class="span1">
	</div>
	<div class="span10">

		<div class="row">
			
			<div class="span5" align="center">
				<img data-src="js/holder.js/116x165" alt="">
			</div>
			
			<div class="span5">
				<h3></h3>
				<p><?=$paragraphs[0]?></p>
				<?php
				
				foreach($paragraphs as $i => $p)
					echo "<p id=\"".$i."\" style=\"display: none\">".$p."</p>";
				
				
				?>
				
			</div>
			
		</div>
		
		<div class="row">
			<div class="span5" align="center">
				<a class="btn" href="index.php?page=reveal&isbn=<?=$isbn?>">Reveal book</a>
			</div>
			
			<div class="span5">
				<a class="btn btn-success" href="#" onclick="readmore()" id="readmorebutton">Read more</a>
				<a class="btn btn-danger" href="index.php?page=player&l1=<?=$genre?>">Next book</a>
			</div>
			
		</div>
		
	</div>
	
	<div class="span1">
	</div>
	
</div>

