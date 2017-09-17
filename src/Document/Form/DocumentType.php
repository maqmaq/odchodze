<?php

namespace Document\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('city', TextType::class)
        ->add('date', DateType::class)
        ->add('senderFullName', TextType::class)
        ->add('senderAddress', TextareaType::class)
        ->add('recipientFullName', TextType::class)
        ->add('recipientAddress', TextareaType::class)
        ->add('contractDate', DateType::class)
        ->add('noticeType', ChoiceType::class, [
            'choices' => $this->getNoticeTypeChoices()
        ])
        ->add('submit', SubmitType::class, [
            'label' => 'Send',
        ]);
    }

    /**
     * @return array
     */
    protected function getNoticeTypeChoices()
    {
        return array_combine(\Document\Model\Document::NOTICE_TYPES, \Document\Model\Document::NOTICE_TYPES);
    }

}