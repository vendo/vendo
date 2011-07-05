<?php

$steps->And('/^there should be (\d+) item|items in my shopping cart$/', function($world, $num) {
	$node = $world->getSession()->getPage()->find('xpath', '//td[@id="total_items"]');

	assertTrue($node->getText() == $num);
});

$steps->Given('/^I create a test product$/', function($world) {
	$product = new Model_Vendo_Product;
	$product->set_fields(
		array(
			'name' => 'Test Product',
			'price' => 9.99,
			'description' => 'BDD Test',
			'order' => 1
		)
	);
	$product->save();
	$world->models['product'] = $product;
});

$steps->Given('/^I delete the test product$/', function($world) {
	$product = Model::factory('vendo_product')->load(
		db::select()->where('name', '=', 'Test Product')
	)->delete();
});

$steps->Given('/^I visit the test product page$/', function($world) {
	$product = Model::factory('vendo_product')->load(
		db::select()->where('name', '=', 'Test Product')
	);
	$world->getSession()->visit($world->getPathTo('/product/view/'.$product->id));
});

$steps->When('/^I check the delete checkbox for "([^"]*)"$/', function($world, $product_name) {
	$product = Model::factory('vendo_product')->load(
		db::select()->where('name', '=', $product_name)
	);
	$world->getSession()->getDriver()->check('//input[@name="delete['.$product->id.']"]');
});

$steps->When('/^I update the quantity of "([^"]*)" to "(\d+)"$/', function($world, $product_name, $num) {
	$product = Model::factory('vendo_product')->load(
		db::select()->where('name', '=', $product_name)
	);
	$world->getSession()->getDriver()->setValue('//input[@name="new_quantity['.$product->id.']"]', $num);
});