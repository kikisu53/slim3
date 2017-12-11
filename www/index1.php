<?php
// start using Slim
require __DIR__ . '/../vendor/autoload.php'; 

$app = new \Slim\App(); // path = /vender/slim/slim/Slim/App.php (defined by /vender/autoload.php)

// Define app routes
$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello " . $args['name']);
});

// Run app
$app->run();