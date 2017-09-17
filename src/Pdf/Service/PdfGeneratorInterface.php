<?php


namespace Pdf\Service;

/**
 * Interface PdfGeneratorInterface
 * @package Pdf\Service
 */
interface PdfGeneratorInterface
{

    /**
     * @param $html
     * @return mixed
     */
    public function generateFromHtml($html);

    /**
     * @param $filename
     * @return mixed
     */
    public function outputFile($filename);

}