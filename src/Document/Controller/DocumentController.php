<?php

namespace Document\Controller;

use Document\Form\DocumentType;
use Document\Service\DefaultDocumentService;
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
     * @var \Pdf\Service\PdfGeneratorInterface
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
     * DocumentController constructor.
     * @param FormFactory $formFactory
     * @param Twig_Environment $twig
     * @param \Pdf\Service\PdfGeneratorInterface $pdfGenerator
     * @param Request $request
     * @param DefaultDocumentService $defaultDocumentService
     * @internal param $ $
     */
    public function __construct(FormFactory $formFactory,
                                Twig_Environment $twig,
                                \Pdf\Service\PdfGeneratorInterface $pdfGenerator,
                                Request $request,
                                DefaultDocumentService $defaultDocumentService)
    {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->pdfGenerator = $pdfGenerator;
        $this->request = $request;
        $this->defaultDocumentService = $defaultDocumentService;
    }

    /**
     * @return string
     */
    public function formAction()
    {

        $form = $this->formFactory->createBuilder(DocumentType::class, $this->defaultDocumentService->getDefaultDocument())->getForm();

        $form->handleRequest($this->request);

        if ($form->isValid()) {
            $document = $form->getData();

            $html = $this->twig->render('document/pdf/contract-termination.html.twig', ['document' => $document]);

            $this->pdfGenerator->generateFromHtml($html);
            $this->pdfGenerator->outputFile('example_001.pdf');
        }

        // display the form
        return $this->twig->render('document/form.html.twig', array('form' => $form->createView()));
    }
}