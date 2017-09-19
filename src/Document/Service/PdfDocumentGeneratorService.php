<?php


namespace Document\Service;


use Document\Model\Document;
use Twig_Environment;

/**
 * Class PdfDocumentGenerator
 * @package Document\Service
 */
class PdfDocumentGeneratorService
{

    /**
     * @var Twig_Environment
     */
    private $twig;

    /**
     * PdfDocumentGeneratorService constructor.
     * @param Twig_Environment $twig
     */
    public function __construct(Twig_Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param Document $document
     * @return string
     */
    public function generateHtmlForDocument(Document $document) {

        // at this moment only one document type is handled so
        return $this->twig->render('document/pdf/contract-termination.html.twig', ['document' => $document]);

    }
}