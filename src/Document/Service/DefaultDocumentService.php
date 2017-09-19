<?php

namespace Document\Service;

use Symfony\Component\Translation\Translator;

/**
 * Class DefaultDocumentService
 * @package Document\Service
 */
class DefaultDocumentService
{
    /**
     * @var Translator
     */
    private $translator;

    /**
     * DefaultDocumentService constructor.
     * @param Translator $translator
     */
    public function __construct(\Symfony\Component\Translation\DataCollectorTranslator $translator)
    {
        $this->translator = $translator;
    }


    /**
     * @return \Document\Model\Document
     */
    public function getDefaultDocument()
    {

        $document = new \Document\Model\Document();
        $document->setDate(new \DateTime());
        $document->setCity($this->translator->trans('Sample city'));
        $document->setSenderFullName($this->translator->trans('Sample sender full name'));
        $document->setSenderAddress($this->translator->trans('Sample sender address'));
        $document->setContractDate(new \DateTime('2012-06-01'));
        $document->setNoticeType(\Document\Model\Document::NOTICE_TYPE_ONE_MONTH);
        $document->setRecipientAddress($this->translator->trans('Sample recipient address'));
        $document->setRecipientFullName($this->translator->trans('Sample recipient full name'));

        return $document;

    }

}