<?php

namespace Document\Provider;

use Document\Service\DefaultDocumentService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class DefaultDocumentServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['document.default_document'] = $app->factory(function () use ($app) {

            $service = new DefaultDocumentService();
            return $service;
        });
    }

}