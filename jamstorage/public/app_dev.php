<?php

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;

require __DIR__ . '/../vendor/autoload.php';
Debug::enable();

$kernel = new Kernel('dev', true);

if (!isset($_SERVER['APP_ENV'])) {
    $dotEnv = new Dotenv();
    $dotEnv->load($kernel->getProjectDir() . '/config/packages/' . $kernel->getEnvironment() . '/.env');
}

$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
