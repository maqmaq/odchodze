<?php

namespace Document\Service;

/**
 * Class DefaultDocumentService
 * @package Document\Service
 */
class DefaultDocumentService
{

    /**
     * @return \Document\Model\Document
     */
    public function getDefaultDocument()
    {

        $document = new \Document\Model\Document();
        $document->setDate(new \DateTime());
        $document->setCity('Gdańsk');
        $document->setSenderFullName('Jan Kowalski');
        $document->setSenderAddress(<<<EOF
ul. Akacjowa 1A
30-400 Wałbrzych
EOF
        );
        $document->setContractDate(new \DateTime('2012-06-01'));
        $document->setNoticeType(\Document\Model\Document::NOTICE_TYPE_ONE_MONTH);
        $document->setRecipientAddress('Warszawska 1');
        $document->setRecipientFullName('Budpol sp. z o.o.');

        return $document;

    }

}