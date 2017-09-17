<?php

namespace Document\Model;
/**
 * Class Document
 */
class Document
{

    const NOTICE_TYPE_ONE_WEEK = 'one week';
    const NOTICE_TYPE_TWO_WEEKS = 'two weeks';
    const NOTICE_TYPE_ONE_MONTH = 'one month';
    const NOTICE_TYPE_TWO_MONTHS = 'two months';
    const NOTICE_TYPE_THREE_MONTHS = 'three months';

    const NOTICE_TYPES = [
        self::NOTICE_TYPE_ONE_WEEK,
        self::NOTICE_TYPE_TWO_WEEKS,
        self::NOTICE_TYPE_ONE_MONTH,
        self::NOTICE_TYPE_TWO_MONTHS,
        self::NOTICE_TYPE_THREE_MONTHS,
    ];

    /**
     * @var string
     */
    protected $city;

    /**
     * @var \DateTime
     */
    protected $date;

    /**
     * @var string
     */
    protected $senderFullName;

    /**
     * @var string
     */
    protected $senderAddress;

    /**
     * @var string
     */
    protected $recipientFullName;

    /**
     * @var string
     */
    protected $recipientAddress;

    /**
     * @var \DateTime
     */
    protected $contractDate;

    /**
     * @var string
     */
    protected $noticeType;

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param \DateTime $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return string
     */
    public function getSenderFullName()
    {
        return $this->senderFullName;
    }

    /**
     * @param string $senderFullName
     */
    public function setSenderFullName($senderFullName)
    {
        $this->senderFullName = $senderFullName;
    }

    /**
     * @return string
     */
    public function getSenderAddress()
    {
        return $this->senderAddress;
    }

    /**
     * @param string $senderAddress
     */
    public function setSenderAddress($senderAddress)
    {
        $this->senderAddress = $senderAddress;
    }

    /**
     * @return string
     */
    public function getRecipientFullName()
    {
        return $this->recipientFullName;
    }

    /**
     * @param string $recipientFullName
     */
    public function setRecipientFullName($recipientFullName)
    {
        $this->recipientFullName = $recipientFullName;
    }

    /**
     * @return string
     */
    public function getRecipientAddress()
    {
        return $this->recipientAddress;
    }

    /**
     * @param string $recipientAddress
     */
    public function setRecipientAddress($recipientAddress)
    {
        $this->recipientAddress = $recipientAddress;
    }

    /**
     * @return \DateTime
     */
    public function getContractDate()
    {
        return $this->contractDate;
    }

    /**
     * @param \DateTime $contractDate
     */
    public function setContractDate($contractDate)
    {
        $this->contractDate = $contractDate;
    }

    /**
     * @return string
     */
    public function getNoticeType()
    {
        return $this->noticeType;
    }

    /**
     * @param string $noticeType
     */
    public function setNoticeType($noticeType)
    {
        $this->noticeType = $noticeType;
    }


}