<?php

use Document\Provider\PdfDocumentGeneratorServiceProvider;
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
    'locale_fallbacks' => array('en'),

));
$app->register(new Silex\Provider\ValidatorServiceProvider());
$app->register(new Silex\Provider\CsrfServiceProvider());
$app->register(new Silex\Provider\ServiceControllerServiceProvider());

$app->register(new \Pdf\Provider\PdfServiceProvider());
$app->register(new \Tcpdf\Provider\TcpdfServiceProvider());

$app->register(new \Document\Provider\DefaultDocumentServiceProvider());
$app->register(new PdfDocumentGeneratorServiceProvider());

$app->register(new Pmaxs\Silex\Locale\Provider\LocaleServiceProvider(), [
    'locale.locales' => ['en', 'pl'],
    'locale.default_locale' => 'pl',
    'locale.resolve_by_host' => false,
    'locale.exclude_routes' => [],
]);

$app->register(new Silex\Provider\LocaleServiceProvider(), [
]);

$app['twig'] = $app->extend('twig', function ($twig, $app) {
    // add custom globals, filters, tags, ...

    return $twig;
});

$app->extend('translator', function ($translator, $app) {
    /** @var $translator \Symfony\Component\Translation\Translator */
    $translator->addLoader('yaml', new YamlFileLoader());

    $translator->addResource('yaml', __DIR__ . '/../locales/pl.yml', 'pl', 'messages');
    $translator->addResource('yaml', __DIR__ . '/../locales/en.yml', 'en', 'messages');

    return $translator;
});

return $app;
