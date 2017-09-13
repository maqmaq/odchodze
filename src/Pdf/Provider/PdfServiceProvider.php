<?php

namespace Pdf\Provider;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PdfServiceProvider implements ServiceProviderInterface
{
    public function register(Container $app)
    {
        $app['pdf.generator'] = $app->factory(function() use ($app) {
            $pdfGenerator = new \TCPDF();
            return $pdfGenerator;
        });
    }

}