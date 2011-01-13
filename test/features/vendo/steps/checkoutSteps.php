<?php

$steps->Given('/^there are items in my cart$/', function($world) {
	$world->visit('cart/add?id=105');
	assertTrue($world->response->filter('.total_items')->extract(array('_text')) > 0);
});

$steps->Then('/^I should see the "(.+)" page$/', function($world, $title) {
	$text = $world->response->filter('div#content > h2')->extract(array('_text'));
	assertSame(current($text), $title);
});