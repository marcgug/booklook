<?
// details.php

// get ebook content for ISBN number

// make the api call to get content

// 1. init curl
$ch = curl_init("http://diner.harpercollins.com/api/content/epubFetch?apiname=EpubView&isbn=".$_GET["isbn"]."&apikey=".$CONTENT_API_KEY."");

// 2. don't include header, don't print to stdout
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// 3. execute
$curl_result = curl_exec($ch);

// 4. decode
//$result = json_decode($curl_result, true);

// 5. close curl
curl_close($ch);

print_r($curl_result);
?>