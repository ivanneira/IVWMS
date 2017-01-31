<?php
// Routes

//$app->get('/[{name}]', function ($request, $response, $args) {
//    // Sample log message
//    //$this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});

$app->get('/', function ($request, $response, $args) {

    // Render index view
    return $this->renderer->render($response, 'index.phtml', $args);
});


$app->get('/pagos', function ($request, $response, $args) use($app){

    return $this->renderer->render($response, 'view_pagos.php', $args);
});

$app->get('/get_pagos', function (){

    include_once ('../controllers/pagos.php');

    return getData();
});

$app->get('/clientes', function($request,$response,$args) use($app){

   return $this->renderer->render($response, 'view_clientes.php', $args);
});