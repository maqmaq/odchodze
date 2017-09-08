<?php

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


//Request::setTrustedProxies(array('127.0.0.1'));

$app['document.controller'] = function() use ($app) {
    return new \Controllers\DocumentController($app['form.factory'], $app['twig'], $app['snappy.pdf'], $app['request_stack']->getCurrentRequest());
};

$app->match('/', 'document.controller:indexAction')->bind('homepage');

$app->error(function (\Exception $e, Request $request, $code) use ($app) {
    if ($app['debug']) {
        return;
    }

    // 404.html, or 40x.html, or 4xx.html, or error.html
    $templates = array(
        'errors/' . $code . '.html.twig',
        'errors/' . substr($code, 0, 2) . 'x.html.twig',
        'errors/' . substr($code, 0, 1) . 'xx.html.twig',
        'errors/default.html.twig',
    );

    return new Response($app['twig']->resolveTemplate($templates)->render(array('code' => $code)), $code);
});
