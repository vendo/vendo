<?php

$steps->Given('/^I am logged out$/', function($world) {
	$world->client->restart();
	$world->visit('/');
});

$steps->Then('/^I should be logged in$/', function($world) use ($steps) {
	$steps->Then('I should see "Logged In"', $world);
});

$steps->Then('/^I should be logged out$/', function($world) use ($steps) {
	$steps->Then('I should see "Logged Out"', $world);
});

$steps->Given('/^I have a contact model$/', function($world) use($steps) {
	$steps->Given('I have an address model', $world);
	$address = $world->models['address'];
	$contact = new Model_Contact;
	$contact->set_fields(
		array(
			'email' => 'foo@bar.com',
			'first_name' => 'Foo',
			'last_name' => 'Bar',
			'address_id' => $address->id,
		)
	);
	$contact->save();
	$world->models['contact'] = $contact;
});

$steps->Given('/^I have an address model$/', function($world) {
	$address = new Model_Vendo_Address;
	$address->set_fields(
		array(
			'billing_address' => '1234 main st',
			'billing_city' => 'Nowhere',
			'shipping_address' => '1234 main st',
			'shipping_city' => 'Nowhere',
		)
	);
	$address->save();
	$world->models['address'] = $address;
});