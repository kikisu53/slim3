<?php
// start using Slim
require __DIR__ . '/../vendor/autoload.php';

// Create and configure Slim app
// $config = ['settings' => [
//     'addContentLengthHeader' => false,
// ]];
// 把 $config 獨立為一個檔案
$config = require __DIR__ . '/../config/config.php';
$app = new \Slim\App($config);

// Define app routes
$app->get('/hello/{name}', function ($request, $response, $args) {
    return $response->write("Hello " . $args['name']);
});

// Class Test {
//     public function showtest(){
//         echo 'showtest';
//     }
// }


$app->get('/test', function($request, $response){
//   $test = new Test;  
$test = new \Controllers\Test;
    $gt = $test -> showtest();
    return $response -> getBody()->write($gt);
});

// Run app
$app->run();