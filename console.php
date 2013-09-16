<?php

require 'vendor/autoload.php';

require 'settings.php';

$url = 'https://api.twitter.com/1.1/users/lookup.json';
$getfield = sprintf('?include_entities=false&screen_name=%s', implode(",", $profiles_to_query));
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$dataIn = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();

$dataIn = json_decode($dataIn);

$date = date('c');

$out = array();
foreach ($dataIn as $data) {
	$out[] = array(
		'date'           => $date,
		'name'           => $data->screen_name,
		'followers'      => $data->followers_count,
		'follows_others' => $data->friends_count,
		'listed_in'      => $data->listed_count,
		'favorites'      => $data->favourites_count,
		'statuses'       => $data->statuses_count
	);
	
}

$fp = fopen('data/twitter_data_all.csv', 'a');

foreach ($out as $fields) {
    fputcsv($fp, $fields);
}

fclose($fp);


