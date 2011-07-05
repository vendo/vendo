<?php

// Init kohana
require_once '../modules/unittest/bootstrap.php';

require_once 'mink/autoload.php';
require_once 'Zend/Registry.php';
require_once 'PHPUnit/Autoload.php';
require_once 'PHPUnit/Framework/Assert/Functions.php';

// Ignore facebook html errors
libxml_use_internal_errors(true);