<?php

$app->get('/', function ($request, $response) {
    return $this->view->render($response, 'home.twig');
});

$app->get('/{token}', function ($request, $response) {
    $token = $request->getAttribute('token');
    return $token;
});

