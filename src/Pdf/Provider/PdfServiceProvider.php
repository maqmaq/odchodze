<?php

namespace Pdf\Provider;

use Pdf\Service\PdfGenerator;
use Pimple\Container;
use Pimple\ServiceProviderInterface;

class PdfServiceProvider implements ServiceProviderInterface
{
    /**
     * @param Container $app
     */
    public function register(Container $app)
    {
        $app['pdf.generator'] = $app->factory(function() use ($app) {
            // @todo move to another service provider
            $tcpdf = new \TCPDF();

            $pdfGenerator = new PdfGenerator($tcpdf);
            $pdfGenerator->setHeaderFont(['dejavusans', '', 10, '', false]);
            $pdfGenerator->setFooterFont(['dejavusans', '', 8, '', false]);
            $pdfGenerator->SetFont('dejavusans', '', 10, '', false);
            return $pdfGenerator;
        });
    }

}