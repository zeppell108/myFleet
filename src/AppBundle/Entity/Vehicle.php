<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\User;

/**
 * Vehicle
 *
 * @ORM\Table(name="vehicle")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\VehicleRepository")
 */
class Vehicle
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
     * @ORM\Column(name="name", type="string", length=20)
     */
    private $name;

    /**
     * @var \stdClass
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="vehicle")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Column(name="purchase_price", type="integer")
     */
    private $purchasePrice;

    /**
     * @var int
     *
     * @ORM\Column(name="sale_price", type="integer", nullable=true)
     */
    private $salePrice;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="purchase_date", type="date")
     */
    private $purchaseDate;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="sale_date", type="date")
     */
    private $saleDate;

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
     * @return Vehicle
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
     * Set user
     *
     * @param \stdClass $user
     * @return Vehicle
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \stdClass
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @return integer
     */
    public function getPurchasePrice()
    {
        return $this->purchasePrice;
    }

    /**
     * @param int $purchasePrice
     * @return Vehicle
     */
    public function setPurchasePrice(int $purchasePrice)
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getPurchaseDate()
    {
        return $this->purchaseDate;
    }

    /**
     * @param DateTime $purchaseDate
     * @return Vehicle
     */
    public function setPurchaseDate(DateTime $purchaseDate)
    {
        $this->purchaseDate = $purchaseDate;

        return $this;
    }

    /**
     * @return DateTime
     */
    public function getSaleDate()
    {
        return $this->saleDate;
    }

    /**
     * @param DateTime $saleDate
     * @return Vehicle
     */
    public function setSaleDate(DateTime $saleDate)
    {
        $this->saleDate = $saleDate;

        return $this;
    }

    /**
     * @return int
     */
    public function getSalePrice()
    {
        return $this->salePrice;
    }

    /**
     * @param int $salePrice
     * @return Vehicle
     */
    public function setSalePrice(int $salePrice)
    {
        $this->salePrice = $salePrice;

        return $this;
    }
}
