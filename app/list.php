<?php
// list.php

// get a list of books and display info on them


// Decide what search term to use:
if($_POST["authorname"])
	$authorname = $_POST["authorname"];
else
	$authorname = "Dahl";

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

?>
<p>Showing results for: <?=$authorname;?>
<table class="table table-bordered table-striped table-condensed">

<?php foreach ($result["Product_Group"] as $item): ?>

<tr>
<td><img src="<?=$item["Products"]["CoverImageURL_Medium"];?>" class="img-rounded"></td>
<td><?=$item["Product_Group_Title"];?><br />
Format: <?=$item["Products"]["Format"]?><br />
<a href="index.php?page=view_content&isbn=<?=$item["Products"]["ISBN"]?>">View content</a></td>
<td><?=$item["Products"]["Author1"];?></td>	
</tr>
<?php endforeach; ?>
</table>