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
use Symfony\Component\Translation\Loader\YamlFileLoader;

$app = new Application();
$app->register(new ServiceControllerServiceProvider());
$app->register(new AssetServiceProvider());
$app->register(new TwigServiceProvider());
$app->register(new HttpFragmentServiceProvider());
$app->register(new FormServiceProvider());
$app->register(new Silex\Provider\TranslationServiceProvider(), array(
    'translator.domains' => array(),
    'locale_fallbacks' => array('en', 'pl'),

));
$app->register(new Silex\Provider\LocaleServiceProvider());
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\CsrfServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

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

$app->extend('translator', function($translator, $app) {
    $translator->addLoader('yaml', new YamlFileLoader());

    $translator->addResource('yaml', __DIR__.'/locales/pl.yml', 'pl');

    return $translator;
});

return $app;
