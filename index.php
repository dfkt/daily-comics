<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Daily Comics</title>
		<link rel="shortcut icon" href="./favicon.ico" />
		<link rel="stylesheet" type="text/css" href="./style.css" />
	</head>
	<body>

		<!-- RED MEAT - - - - - - - - - - - - - - - - - - - - - - - - - - -->

		<?php
			$url = 'https://www.redmeat.com/max-cannon/FreshMeat';

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
			echo "\t\t";
			echo '<div class="outerwrapper"><div class="linkwrapper"><a href="';
			echo $url;
			echo '" class="rotate">';
			echo $url;
			echo '</a></div>';
			echo PHP_EOL;
			echo "\t\t";
			echo '<div class="center">';
			echo $matches[1][0];
			echo '</div></div>';
			echo PHP_EOL;
		?>

		<!-- KING FEATURES  - - - - - - - - - - - - - - - - - - - - - - - -->

		<?php
			$urls = Array(
				'http://hagarthehorrible.com/',
				'http://hiandlois.com/',
			);

			foreach ($urls as $url) {

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$output = curl_exec($ch);
				curl_close($ch);
				if(empty($output)) exit('Couldn\'t download the strip.');

				$pattern = '/<meta property="og:image" content="(([^.]|.)*?)<meta property="og:type" content="website"\/>/';
				preg_match_all($pattern, $output, $matches);

				echo '<!-- ';
				echo $url;
				echo ' -->';
				echo PHP_EOL;
				echo "\t\t";
				echo '<div class="outerwrapper"><div class="linkwrapper"><a href="';
				echo $url;
				echo '" class="rotate">';
				echo $url;
				echo '</a></div>';
				echo PHP_EOL;
				echo "\t\t";
				echo '<div class="center"><img alt="" src="';
				echo $matches[1][0];
				echo '</div></div>';
				echo PHP_EOL;
				echo "\n\t\t";
			}
		?>

		<!-- DILBERT  - - - - - - - - - - - - - - - - - - - - - - - - - - -->

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
			echo "\t\t";
			echo '<div class="outerwrapper"><div class="linkwrapper"><a href="';
			echo $url;
			echo '" class="rotate">';
			echo $url;
			echo '</a></div>';
			echo PHP_EOL;
			echo "\t\t";
			echo '<div class="center">';
			$string = $matches[1][0];
			$string = preg_replace("/http:/", "https:", $string);
			echo($string);
			echo '</div></div>';
			echo PHP_EOL;
		?>

		<!-- GOCOMICS - - - - - - - - - - - - - - - - - - - - - - - - - - -->

		<?php
			$urls = Array(
				'http://www.gocomics.com/dilbert-classics/',
				'http://www.gocomics.com/pearlsbeforeswine/',
				'http://www.gocomics.com/lio/',
				'http://www.gocomics.com/garfield/',
				'http://www.gocomics.com/garfieldminusgarfield/',
				'http://www.gocomics.com/nonsequitur/',
				'http://www.gocomics.com/wizardofid/',
				'http://www.gocomics.com/the-middle-age/',
				'http://www.gocomics.com/andycapp/',
				'http://www.gocomics.com/muttandjeff/',
				'http://www.gocomics.com/calvinandhobbes/',
				'http://www.gocomics.com/frank-and-ernest/',
				'http://www.gocomics.com/bc/',
				'http://www.gocomics.com/inthebleachers/',
				'http://www.gocomics.com/theflyingmccoys/',
				'http://www.gocomics.com/toomuchcoffeeman/',
			);

			foreach ($urls as $url) {

				$ch = curl_init($url);
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
				$output = curl_exec($ch);
				curl_close($ch);
				if(empty($output)) exit('Couldn\'t download the strip.');

				$pattern = '/<meta property="og:image" content="(([^.]|.)*?)<meta property="og:image:height" content="\d{1,4}" \/>/';
				preg_match_all($pattern, $output, $matches);
				
				echo '<!-- ';
				echo $url;
				echo ' -->';
				echo PHP_EOL;
				echo "\t\t";
				echo '<div class="outerwrapper"><div class="linkwrapper"><a href="';
				echo $url;
				echo '" class="rotate">';
				echo $url;
				echo '</a></div>';
				echo PHP_EOL;
				echo "\t\t";
				echo '<div class="center"><img alt="" src="';
				$string = $matches[1][0];
				$string = preg_replace("/http:/", "https:", $string);
				echo($string);
				echo '</div></div>';
				echo PHP_EOL;
				echo "\n\t\t";

			}
		?>

		<!--  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->

	</body>
</html>
