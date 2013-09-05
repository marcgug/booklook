<?php
// list.php

// get a list of books and display info on them


// Decide what search term to use:
if($_POST["authorname"]) // a search has been submitted, so use that search term
	$authorname = $_POST["authorname"];
else
	$authorname = "James";

// make api call:

// 1. init curl
$ch = curl_init("http://api.harpercollins.com/api/v3/hcapim?apiname=catalog&format=JSON&authorname=".$authorname."&apikey=".$DATA_API_KEY."");

// 2. don't include header, don't print to stdout
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// 3. execute
$curl_result = curl_exec($ch);

// 4. decode
$result = json_decode($curl_result, true);

// 5. close curl
curl_close($ch);

//print_r($result);

?>
<p>Showing results for: <?=$authorname;?>
<table class="table table-bordered table-striped table-condensed">

<?php foreach ($result["Product_Group"] as $item): ?>

<tr>
<td align="center"><img src="<?=$item["Products"]["CoverImageURL_Medium"];?>" class="img-rounded pagination-centered"></td>
<td><h2><?=$item["Product_Group_Title"];?></h2>
<h3>By <?=$item["Products"]["Author1"];?></h3>
<a href="index.php?page=view_content&isbn=<?=$item["Products"]["ISBN"]?>">Read complete book</a></td>

</tr>
<?php endforeach; ?>
</table>