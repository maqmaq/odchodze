<?php

define ('HOME_PATH', realpath(__DIR__ . '/../'));
define ('VENDOR_PATH', realpath(HOME_PATH . '/vendor'));

use Nass600\Silex\Provider\SnappyServiceProvider;
use Silex\Application;
use Silex\Provider\AssetServiceProvider;
use Silex\Provider\TwigServiceProvider;
use Silex\Provider\ServiceControllerServiceProvider;
use Silex\Provider\HttpFragmentServiceProvider;
use Silex\Provider\FormServiceProvider;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
    'locale_fallbacks' => array('en'),

));
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());

$app->register(new SnappyServiceProvider(), array(
    'snappy.pdf.binary' => sprintf('%s/%s', VENDOR_PATH, 'bin/wkhtmltopdf-amd64'),
    'snappy.pdf.options' => array(
        'footer-center' => 'page [page]'
    ),
    'snappy.image.binary' => '/path/to/wkhtmltoimage',
    'snappy.image.options' => array(
        'format' => 'png'
    )
));

$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

return $app;
