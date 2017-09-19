<?php


namespace Document\Provider;


use Document\Service\PdfDocumentGeneratorService;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PdfDocumentGeneratorServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['document.pdf_generator'] = function () use ($app) {

            $twig = $app['twig'];
            $service = new PdfDocumentGeneratorService($twig);

            return $service;
        };
    }

}