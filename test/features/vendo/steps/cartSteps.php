<?php

$steps->And('/^there should be (\d+) item in my shopping cart$/', function($world, $num) {
    assertTrue(current($world->response->filter('.total_items')->extract(array('_text'))) == $num);
});