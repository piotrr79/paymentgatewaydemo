<?php

namespace Websolutio\PaymentBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Payment
 */
class Payment
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $surname;

    /**
     * @var string
     */
    private $ipaddress;

    /**
     * @var string
     */
    private $ammount;

    /**
     * @var string
     */
    private $currency;

    /**
     * @var string
     */
    private $cardnumber;

    /**
     * @var string
     */
    private $expirationmonth;

    /**
     * @var string
     */
    private $expirationyear;

    /**
     * @var string
     */
    private $cardtype;

    /**
     * @var boolean
     */
    private $status;

    /**
     * @var string
     */
    private $apiresultcode;
    

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Payment
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return Payment
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set ipaddress
     *
     * @param string $ipaddress
     * @return Payment
     */
    public function setIpaddress($ipaddress)
    {
        $this->ipaddress = $ipaddress;

        return $this;
    }

    /**
     * Get ipaddress
     *
     * @return string 
     */
    public function getIpaddress()
    {
        return $this->ipaddress;
    }

    /**
     * Set ammount
     *
     * @param string $ammount
     * @return Payment
     */
    public function setAmmount($ammount)
    {
        $this->ammount = $ammount;

        return $this;
    }

    /**
     * Get ammount
     *
     * @return string 
     */
    public function getAmmount()
    {
        return $this->ammount;
    }

    /**
     * Set currency
     *
     * @param string $currency
     * @return Payment
     */
    public function setCurrency($currency)
    {
        $this->currency = $currency;

        return $this;
    }

    /**
     * Get currency
     *
     * @return string 
     */
    public function getCurrency()
    {
        return $this->currency;
    }

    /**
     * Set cardnumber
     *
     * @param string $cardnumber
     * @return Payment
     */
    public function setCardnumber($cardnumber)
    {
        $this->cardnumber = $cardnumber;

        return $this;
    }

    /**
     * Get cardnumber
     *
     * @return string 
     */
    public function getCardnumber()
    {
        return $this->cardnumber;
    }

    /**
     * Set expirationmonth
     *
     * @param string $expirationmonth
     * @return Payment
     */
    public function setExpirationmonth($expirationmonth)
    {
        $this->expirationmonth = $expirationmonth;

        return $this;
    }

    /**
     * Get expirationmonth
     *
     * @return string 
     */
    public function getExpirationmonth()
    {
        return $this->expirationmonth;
    }

    /**
     * Set expirationyear
     *
     * @param string $expirationyear
     * @return Payment
     */
    public function setExpirationyear($expirationyear)
    {
        $this->expirationyear = $expirationyear;

        return $this;
    }

    /**
     * Get expirationyear
     *
     * @return string 
     */
    public function getExpirationyear()
    {
        return $this->expirationyear;
    }

    /**
     * Set cardtype
     *
     * @param string $cardtype
     * @return Payment
     */
    public function setCardtype($cardtype)
    {
        $this->cardtype = $cardtype;

        return $this;
    }

    /**
     * Get cardtype
     *
     * @return string 
     */
    public function getCardtype()
    {
        return $this->cardtype;
    }

    /**
     * Set status
     *
     * @param boolean $status
     * @return Payment
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return boolean 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set apiresultcode
     *
     * @param string $apiresultcode
     * @return Payment
     */
    public function setApiresultcode($apiresultcode)
    {
        $this->apiresultcode = $apiresultcode;

        return $this;
    }

    /**
     * Get apiresultcode
     *
     * @return string 
     */
    public function getApiresultcode()
    {
        return $this->apiresultcode;
    }
}
