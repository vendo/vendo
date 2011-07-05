<?php

$steps->Given('/^there are items in my cart$/', function($world) {
	$product = Model::factory('vendo_product')->load(
		db::select()->where('name', '=', 'Foobar')
	);
	$world->getSession()->visit('/cart/add?id='.$product->id);
	$node = $world->getSession()->getPage()->find('xpath', '//td[@id="total_items"]');

	assertTrue($node->getText() > 0);
});

$steps->Then('/^I should see the "(.+)" page$/', function($world, $title) {
	$node = $world->getSession()->getPage()->find('xpath', '//div[@id="content"]/h2');
	assertSame($title, $node->getText());
});