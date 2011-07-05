<?php

// Create WebClient behavior
$world->client = new \Goutte\Client;
$world->client->setServerParameters(array('HTTP_HOST' => 'vendo'));
$world->response = null;
$world->form = array();
$world->models = array();

// Helpful closures 
$world->visit = function($link) use($world) {
	$world->response = $world->client->request('GET', $link);
};

// Clean up our model space
register_shutdown_function(function($world)
{
	try
	{
		foreach ($world->models as $model)
		{
			$model->delete();
		}
	}
	catch (Exception $e)
	{
		//var_dump('Couldn\'t delete a model: '.$e->getMessage());
	}
},
$world);