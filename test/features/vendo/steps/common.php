<?php

/*$steps->When('/^I click the (.+) link$/', function($world, $anchor_text) {
	$link = $world->response->selectLink($anchor_text)->link();
	$world->response = $world->client->click($link);
});*/

$steps->When('/^I submit the form$/', function($world) {
	$form = $world->response->selectButton('Submit')->form();
	$world->client->submit($form);
});