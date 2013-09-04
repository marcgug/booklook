<?php
// reveal.php




// make api call:

// 1. init curl
$ch = curl_init("http://api.harpercollins.com/api/v3/hcapim?apiname=catalog&format=JSON&isbn=".$_GET["isbn"]."&apikey=".$DATA_API_KEY."");

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

// curl for GR

$chgr = curl_init("http://www.goodreads.com/api/book_url/enders?key=".$GR_KEY."");
// 2. don't include header, don't print to stdout
curl_setopt($chgr, CURLOPT_HEADER, 0);
curl_setopt($chgr, CURLOPT_RETURNTRANSFER, 1);

// 3. execute
$curl_result = curl_exec($chgr);

// 4. decode
//$result = json_decode($curl_result, true);

// 5. close curl
curl_close($chgr);

//print_r($curl_result);

?>


<?php foreach ($result["Product_Group"] as $item): ?>

<div class="row">
<div class="span12 pagination-centered">
<h1>You've been reading...</h1>
<img src="<?=$item["Products"]["CoverImageURL_Large"];?>" class="img-rounded">
</div>
</div>

<?php endforeach; ?>
