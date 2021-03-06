<?php

use Symfony\Component\HttpFoundation\Request;

$env = getenv('SF_ENVIRONMENT');
$debug = $env !== 'prod';

/** @var Composer\Autoload\ClassLoader */
$loader = require __DIR__.'/../app/autoload.php';
if ($debug) {
    \Symfony\Component\Debug\Debug::enable();
} else {
    include_once __DIR__.'/../var/bootstrap.php.cache';
}

$kernel = new AppKernel($env, $debug);
if (!$debug) {
    $kernel->loadClassCache();
}

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
