<?php

namespace Pdf\Service;

class PdfGenerator implements PdfGeneratorInterface
{
    /**
     * @var \TCPDF
     */
    private $generator;

    /**
     * PdfGenerator constructor.
     * @param \TCPDF $generator
     */
    public function __construct(\TCPDF $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @param $html
     * @return mixed
     */
    public function generateFromHtml($html)
    {
        $this->generator->AddPage();
        $this->generator->writeHTML($html);
    }

    /**
     * @param $filename
     * @return string
     */
    public function outputFile($filename)
    {
        return $this->generator->Output($filename, 'I');
    }


    /**
     * @param $method
     * @param $args
     * @return mixed
     */
    public function __call($method, $args)
    {
        return call_user_func_array(array($this->generator, $method), $args);
    }
}