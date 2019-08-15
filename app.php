<?php

// Set timezone...
date_default_timezone_set("America/Toronto");

// Autoload our classes
require __DIR__ . '/vendor/autoload.php';

// Load the sites and application settings into memory from config/"db"
$imt_seed = new \MarxistSocialNews\DatabaseSeed\ImtDatabaseSeed(); // or EmptySeed, SeedFromArray, SeedFromFile, etc...
$db = new \MarxistSocialNews\DatabaseProcessor\JsonDatabaseProcessor(__DIR__.'/db', $imt_seed);

// Create the home page view
$view = new \MarxistSocialNews\View\Homepage($db, [ // TODO Load these strings from a translation file based on input query param (?)
	'title' => 'International Marxist Tendency News Aggregator',
	'logo' => __DIR__.'/img/imt-logo.jpg',
	'favicon' => __DIR__.'/img/favicon.png',
	'meta_description' => 'This web page contains recent articles from sections of the IMT. Use the table of contents to navigate directly to a section.',
	'description' => '<p class="home__meta">This web page contains recent articles from sections of the IMT.</p>',
	'footer' => 'Marxist.social News Aggregator is free software licensed under the GPL. To contribute code or report bugs, visit:',
	'vc_repo' => 'https://github.com/marxist-social/news'
]);
echo $view->render(); 


