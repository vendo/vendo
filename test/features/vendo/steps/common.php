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