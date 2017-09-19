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
        $app['pdf.generator'] = function () use ($app) {
            $tcpdf = $app['tcpdf'];

            $pdfGenerator = new PdfGenerator($tcpdf);
            $pdfGenerator->setHeaderFont(['dejavusans', '', 10, '', false]);
            $pdfGenerator->setFooterFont(['dejavusans', '', 8, '', false]);
            $pdfGenerator->SetFont('dejavusans', '', 10, '', false);
            return $pdfGenerator;
        };
    }

}