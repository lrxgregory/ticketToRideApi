<?php

use App\Kernel;
use Symfony\Component\HttpFoundation\Response;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

if ($_SERVER['REQUEST_URI'] === '/') {
    $response = new Response('', Response::HTTP_FOUND, ['Location' => '/api/doc']);
    $response->send();
    exit;
}

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};
