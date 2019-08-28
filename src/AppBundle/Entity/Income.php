<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Income
 *
 * @ORM\Table(name="income")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IncomeRepository")
 */
class Income
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
     * @ORM\Column(name="incomeName", type="string", length=50)
     */
    private $incomeName;

    /**
     * @var float
     *
     * @ORM\Column(name="incomeValue", type="float")
     */
    private $incomeValue;

    /**
     * @var string
     *
     * @ORM\Column(name="incomeDate", type="string", length=255)
     */
    private $incomeDate;

    /**
     *
     *
     * @ORM\ManyToOne(targetEntity="Account", inversedBy="incomes")
     * @ORM\JoinColumn(name="account_id", referencedColumnName="id")
     */
    private $account;
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
     * Set incomeName
     *
     * @param string $incomeName
     *
     * @return Income
     */
    public function setIncomeName($incomeName)
    {
        $this->incomeName = $incomeName;

        return $this;
    }

    /**
     * Get incomeName
     *
     * @return string
     */
    public function getIncomeName()
    {
        return $this->incomeName;
    }

    /**
     * Set incomeValue
     *
     * @param float $incomeValue
     *
     * @return Income
     */
    public function setIncomeValue($incomeValue)
    {
        $this->incomeValue = $incomeValue;

        return $this;
    }

    /**
     * Get incomeValue
     *
     * @return float
     */
    public function getIncomeValue()
    {
        return $this->incomeValue;
    }

    /**
     * Set incomeDate
     *
     * @param string $incomeDate
     *
     * @return Income
     */
    public function setIncomeDate($incomeDate)
    {
        $this->incomeDate = $incomeDate;

        return $this;
    }

    /**
     * Get incomeDate
     *
     * @return string
     */
    public function getIncomeDate()
    {
        return $this->incomeDate;
    }

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     */
    public function setAccount($account)
    {
        $this->account = $account;
    }

}

