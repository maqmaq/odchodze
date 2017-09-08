<?php

namespace Controllers;

use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class DocumentController
{

    private $formFactory;
    private $twig;
    private $snappy;
    private $request;


    public function __construct($formFactory, $twig, $snappy, $request)
    {
        $this->formFactory = $formFactory;
        $this->twig = $twig;
        $this->snappy = $snappy;
        $this->request = $request;
    }


    public function indexAction()
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

            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="file.pdf"');
            $html = $this->twig->render('document/contract-termination.html.twig', $data);
            echo $this->snappy->getOutputFromHtml($html);
            die();
        }

        // display the form
        return $this->twig->render('index.html.twig', array('form' => $form->createView()));
    }
}