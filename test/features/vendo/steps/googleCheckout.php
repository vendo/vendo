<?php

$steps->Given('/^I have an existing google checkout order$/', function($world) use($steps) {
	$steps->Given('I create a test product', $world);
	$product = Model::factory('vendo_product')->load(
		db::select()->where('name', '=', 'Test Product')
	);
	$steps->Given('I have a contact model', $world);

	$contact = $world->models['contact'];
	$address = $world->models['address'];

	$order = new Model_Order;
	$order->add_product($product);
	$order->contact_id = $contact->id;
	$order->address_id = $address->id;
	$order->order_type_id = Model_Order::TYPE_GOOGLE_CHECKOUT;
	$order->save();
	$world->models['order'] = $order;

	$order_data = new Model_Order_Google;
	$order_data->order_id = $order->id;
	$order_data->save();
});

$steps->When('/^a user submits a google checkout order$/', function($world) {
	// We can't test this
});

$steps->Then('/^I should receive an order notification$/', function($world) {
	$serial = file_get_contents(Kohana::find_file('tests', 'data/google/checkout/serial-number', 'txt'));
	$xml = new Mustache(file_get_contents(Kohana::find_file('tests', 'data/google/checkout/new-order-notification', 'mustache')), array('order_id' => $world->models['order']->id));

	// Send a request
	$response = $world->client->request('POST', '/billing/google-checkout/handle.html', array('serial_number' => $serial, 'xml' => $xml->render()));
});

$steps->And('/^the order should be assigned the google_order_id value from the notification$/', function($world) use($steps) {
	$order = new Model_Order($world->models['order']->id);
	$order_data = $order->get_ancilary_model();
	assertEquals('1234567', $order_data->google_order_id);
});

$steps->When('/^I submit the order$/', function($world) {
	try
	{
		$world->response = Payment_Offsite::process($world->models['order'], TRUE);
	}
	catch (Payment_Exception $e)
	{
		throw new \Everzet\Behat\Exception\Pending('No Internet Connection!');
	}
});

$steps->Then('/^it should return a redirection URL$/', function($world) {
	$url = parse_url($world->response);
	assertInternalType('array', $url);
});