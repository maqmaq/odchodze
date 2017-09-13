<?php

namespace App\Controller;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DocumentController
{

    private $formFactory;
    private $twig;
    private $pdfGenerator;
    private $request;


    public function __construct($formFactory, $twig, $snappy, $request)
    {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->pdfGenerator = $snappy;
        $this->request = $request;
    }


    public function formAction()
    {
        // some default data for when the form is displayed the first time
        $data = array(
            'name' => 'Your name',
        );

        $form = $this->formFactory->createBuilder(FormType::class, $data)
            ->add('name', TextType::class)
            ->add('submit', SubmitType::class, [
                'label' => 'Send',
            ])
            ->getForm();

        $form->handleRequest($this->request);

        if ($form->isValid()) {
            $data = $form->getData();

            $html = $this->twig->render('document/contract-termination.html.twig', $data);
            $this->pdfGenerator->AddPage();

            $this->pdfGenerator->writeHTML($html);
            $this->pdfGenerator->Output('example_001.pdf', 'I');
        }

        // display the form
        return $this->twig->render('index.html.twig', array('form' => $form->createView()));
    }
}