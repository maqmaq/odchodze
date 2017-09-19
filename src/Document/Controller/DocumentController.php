<?php

namespace Document\Controller;

use Document\Form\DocumentType;
use Document\Model\Document;
use Document\Service\DefaultDocumentService;
use Document\Service\PdfDocumentGeneratorService;
use Pdf\Service\PdfGeneratorInterface;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;
use Twig_Environment;

/**
 * Class DocumentController
 * @package Document\Controller
 */
class DocumentController
{
    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @var Twig_Environment
     */
    private $twig;
    /**
     * @var PdfGeneratorInterface
     */
    private $pdfGenerator;
    /**
     * @var Request
     */
    private $request;
    /**
     * @var DefaultDocumentService
     */
    private $defaultDocumentService;
    /**
     * @var PdfDocumentGeneratorService
     */
    private $pdfDocumentGenerator;


    /**
     * DocumentController constructor.
     * @param FormFactory $formFactory
     * @param Twig_Environment $twig
     * @param PdfGeneratorInterface $pdfGenerator
     * @param Request $request
     * @param DefaultDocumentService $defaultDocumentService
     * @param PdfDocumentGeneratorService $pdfDocumentGenerator
     * @internal param $ $
     */
    public function __construct(FormFactory $formFactory,
                                Twig_Environment $twig,
                                PdfGeneratorInterface $pdfGenerator,
                                Request $request,
                                DefaultDocumentService $defaultDocumentService,
                                PdfDocumentGeneratorService $pdfDocumentGenerator
    )
    {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->pdfGenerator = $pdfGenerator;
        $this->request = $request;
        $this->defaultDocumentService = $defaultDocumentService;
        $this->pdfDocumentGenerator = $pdfDocumentGenerator;
    }

    /**
     * @return string
     */
    public function formAction()
    {
        $form = $this->createFormWithDefaultValues();

        $form->handleRequest($this->request);

        if ($form->isValid()) {
            $document = $form->getData();

            $this->pdfGenerator->generateFromHtml($this->getPdfHtmlForDocument($document));
            $this->pdfGenerator->outputFile('example_001.pdf');
        }

        // simply display the form
        return $this->twig->render('document/form.html.twig', array('form' => $form->createView()));
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    protected function createFormWithDefaultValues()
    {
        return $this->formFactory->createBuilder(DocumentType::class, $this->defaultDocumentService->getDefaultDocument())->getForm();
    }

    /**
     * @param Document $document
     * @return string
     */
    protected function getPdfHtmlForDocument(Document $document)
    {
        return $this->pdfDocumentGenerator->generateHtmlForDocument($document);
    }
}