<?php

$steps->And('/^there should be (\d+) item|items in my shopping cart$/', function($world, $num) {
    assertTrue(current($world->response->filter('.total_items')->extract(array('_text'))) == $num);
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

$steps->Given('/^I am on the test product page$/', function($world) {
	$product = Model::factory('vendo_product')->load(
		db::select()->where('name', '=', 'Test Product')
	);
	$world->visit('/product/view/'.$product->id);
});

$steps->When('/^I check the delete checkbox for "([^"]*)"$/', function($world, $product_name) {
	$product = Model::factory('vendo_product')->load(
		db::select()->where('name', '=', $product_name)
	);
	$world->inputFields['delete['.$product->id.']'] = true;
});

$steps->When('/^I update the quantity of "([^"]*)" to "(\d+)"$/', function($world, $product_name, $num) {
	$product = Model::factory('vendo_product')->load(
		db::select()->where('name', '=', $product_name)
	);
	$world->inputFields['new_quantity['.$product->id.']'] = $num;
});