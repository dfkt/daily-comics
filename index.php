<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name=viewport content="width=device-width, initial-scale=1">
<title>Daily Comics</title>
<link rel="shortcut icon" href="./favicon.ico" />
<link rel="stylesheet" type="text/css" href="./style.css" />
<!--<link rel="stylesheet" type="text/css" href="./style.css?version=<?php echo rand() ?>" />-->
</head>
<body>

<!-- RED MEAT --------------------------------------------------- -->

<?php
$url = 'http://www.redmeat.com/max-cannon/FreshMeat';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
if(empty($output)) exit('Couldn\'t download the strip.');

$pattern = '/<div class="comicStrip">[\s]+<a href=".*?">(([^.]|.)*?)<\/a>[\s]+<\/div><!-- \.comicStrip -->/';
preg_match_all($pattern, $output, $matches);

echo '<!-- ';
echo $url;
echo ' -->';
echo PHP_EOL;
echo '<div class="outerwrapper"><div class="linkwrapper"><a href="';
echo $url;
echo '" class="rotate">';
echo $url;
echo '</a></div>';
echo PHP_EOL;
echo '<div class="center">';
echo $matches[1][0];
echo '</div></div>';
echo PHP_EOL;
?>

<!-- DILBERT ---------------------------------------------------- -->

<?php
$url = 'http://dilbert.com/';

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$output = curl_exec($ch);
curl_close($ch);
if(empty($output)) exit('Couldn\'t download the strip.');

$pattern = '/<a itemprop="image" class="img-comic-link" href="http\:\/\/dilbert\.com\/strip\/[\d-]*" title="[\w\',\.!\? -]*">(([^.]|.)*?)<\/a>/';
preg_match_all($pattern, $output, $matches);

echo '<!-- ';
echo $url;
echo ' -->';
echo PHP_EOL;
echo '<div class="outerwrapper"><div class="linkwrapper"><a href="';
echo $url;
echo '" class="rotate">';
echo $url;
echo '</a></div>';
echo PHP_EOL;
echo '<div class="center">';
echo $matches[1][0];
echo '</div></div>';
echo PHP_EOL;
?>

<!-- GOCOMICS --------------------------------------------------- -->

<?php

$urls = Array(
	'http://www.gocomics.com/dilbert-classics/',
	'http://www.gocomics.com/pearlsbeforeswine/',
	'http://www.gocomics.com/lio/',
	'http://www.gocomics.com/garfield/',
	'http://www.gocomics.com/garfieldminusgarfield/',
	'http://www.gocomics.com/nonsequitur/',
	'http://www.gocomics.com/wizardofid/',
	'http://www.gocomics.com/muttandjeff/',
	'http://www.gocomics.com/calvinandhobbes/',
);

// loop start
foreach ($urls as $url) {

	// http://stackoverflow.com/questions/11793184/screen-scraping-with-curl-and-regex
	// cURL
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$output = curl_exec($ch);
	curl_close($ch);
	if(empty($output)) exit('Couldn\'t download the strip.');

	// finding the data
	$pattern = "/<div id=\'mutable_.*?\' style=\'display: none;\'>(([^.]|.)*?)<\/p>(([^.]|.)*?)<!--Share\/Add to...\/More-->/";
	preg_match_all($pattern, $output, $matches);

	if($matches[1][0]): // large click-zoom images
		// display the data
		echo '<!-- ';
		echo $url;
		echo ' LARGE -->';
		echo PHP_EOL;
		echo '<div class="outerwrapper"><div class="linkwrapper"><a href="';
		echo $url;
		echo '" class="rotate">';
		echo $url;
		echo '</a></div>';
		echo PHP_EOL;
		echo '<div class="center">';
		echo $matches[1][0];
		echo '</div>';
		echo PHP_EOL;
	else: // small embedded images
		$pattern = '/<p class="feature_item" data-id=".*?">(([^.]|.)*?)<span class.*?>No Zoom<\/span><\/p>/';
		preg_match_all($pattern, $output, $matches);
		// display the data
		echo '<!-- ';
		echo $url;
		echo ' SMALL -->';
		echo PHP_EOL;
		echo '<div class="outerwrapper"><div class="linkwrapper"><a href="';
		echo $url;
		echo '" class="rotate">';
		echo $url;
		echo '</a></div>';
		echo PHP_EOL;
		echo '<div class="center">';
		echo $matches[1][0];
		echo '</div></div>';
		echo PHP_EOL;
	endif;

} // loop end
?>

<!-- ------------------------------------------------------------ -->

</body>
</html>
