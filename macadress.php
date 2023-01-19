<?php

$app = new \Slim\App();

$app->post('/verify_mac', function ($request, $response) {
    $data = $request->getParsedBody();
    $mac = $data['mac'];
    $signature = $data['signature'];
    if (!$mac || !$signature) {
        return $response->withJson(array('error' => 'Missing mac or signature in request'), 400);
    }
    $computed_signature = hash_hmac('sha256', $mac, 12345);
    if (!hash_equals($computed_signature, $signature)) {
        return $response->withJson(array('error' => 'Invalid signature'), 401);
    }
    return $response->withJson(array('status' => 'valid'));
});

$app->run();