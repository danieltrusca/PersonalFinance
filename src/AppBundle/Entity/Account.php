<?php

namespace AppBundle\Entity;
use Doctrine\Common\Collections\ArrayCollection;


use Doctrine\ORM\Mapping as ORM;

/**
 * Account
 *
 * @ORM\Table(name="account")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AccountRepository")
 */
class Account
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="accountName", type="string", length=100)
     */
    private $accountName;

    /**
     * @var float
     *
     * @ORM\Column(name="accountValue", type="float")
     */
    private $accountValue;

    /**
     * @var string
     *
     * @ORM\Column(name="accountDate", type="string", length=50)
     */
    private $accountDate;

    /**
     *
     *
     * @ORM\OneToMany(targetEntity="Income", mappedBy="account")
     */
    private $incomes;
    public function __construct()
    {
        $this->incomes = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set accountName
     *
     * @param string $accountName
     *
     * @return Account
     */
    public function setAccountName($accountName)
    {
        $this->accountName = $accountName;

        return $this;
    }

    /**
     * Get accountName
     *
     * @return string
     */
    public function getAccountName()
    {
        return $this->accountName;
    }

    /**
     * Set accountValue
     *
     * @param float $accountValue
     *
     * @return Account
     */
    public function setAccountValue($accountValue)
    {
        $this->accountValue = $accountValue;

        return $this;
    }

    /**
     * Get accountValue
     *
     * @return float
     */
    public function getAccountValue()
    {
        return $this->accountValue;
    }

    /**
     * Set accountDate
     *
     * @param string $accountDate
     *
     * @return Account
     */
    public function setAccountDate($accountDate)
    {
        $this->accountDate = $accountDate;

        return $this;
    }

    /**
     * Get accountDate
     *
     * @return string
     */
    public function getAccountDate()
    {
        return $this->accountDate;
    }

    /**
     * @return mixed
     */
    public function getIncomes()
    {
        return $this->incomes;
    }

    /**
     * @param mixed $incomes
     */
    public function setIncomes($incomes)
    {
        $this->incomes = $incomes;
    }

}

