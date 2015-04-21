<?php

require 'vendor/autoload.php';

require 'settings.php';

// $url = 'https://api.twitter.com/1.1/users/lookup.json';
// $getfield = sprintf('?include_entities=false&screen_name=%s', implode(",", $profiles_to_query));
// $requestMethod = 'GET';

$url = 'https://api.twitter.com/1.1/users/show.json';
$getfield = '?screen_name=abehjat';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$dataIn = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

$dataIn = json_decode($dataIn);

echo '<pre>';
print_r($dataIn);
echo '</pre>';

$out = array();
foreach ($dataIn as $data) {
	$out[] = array(
		'name'           => $data->screen_name,
		'followers'      => $data->followers_count,
		'follows_others' => $data->friends_count,
		'listed_in'      => $data->listed_count,
		'favorites'      => $data->favourites_count,
		'statuses'       => $data->statuses_count
	);
	
}

// $fp = fopen('data/twitter_data_all.csv', 'a');

// foreach ($out as $fields) {
//     fputcsv($fp, $fields);
// }

// fclose($fp);

