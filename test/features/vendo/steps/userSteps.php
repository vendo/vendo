<?php

$steps->And('/^I fill out the registration form$/', function($world) use($steps) {
	$steps->When('I fill in "user[email]" with "test@example.com"', $world);
	$steps->And('I fill in "user[first_name]" with "Foo"', $world);
	$steps->And('I fill in "user[last_name]" with "bar"', $world);
	$steps->And('I fill in "user[password]" with "test"', $world);
	$steps->And('I fill in "user[repeat_password]" with "test"', $world);
	$steps->And('I check "user[role_id][]"', $world);
});

$steps->Given('/^I log in$/', function($world) use($steps) {
	$steps->Given('I am logged out', $world);
	$steps->When('I click the "Login" link', $world);
	$steps->And('I fill in "email" with "test@example.com"', $world);
	$steps->And('I fill in "password" with "test"', $world);
	$steps->And('I press "Login"', $world);
});

$steps->Given('/^I delete the test user$/', function($world) {
	$user = new Model_User('test@example.com');
	$user->delete();
});