<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Entity\User as BaseUser;

/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Vehicle", mappedBy="user", cascade={"persist"})
     * @ORM\JoinColumn(name="vehicle_id", referencedColumnName="id")
     */
    private $vehicle;

    /**
     * @ORM\OneToMany(targetEntity="AutoService", mappedBy="user", cascade={"persist"})
     * @ORM\JoinColumn(name="auto_service_id", referencedColumnName="id")
     */
    private $autoService;

    /**
     * User constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->vehicle = new ArrayCollection();
        $this->autoService = new ArrayCollection();
    }

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
     * @return mixed
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * @param mixed $vehicle
     * @return User
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAutoService()
    {
        return $this->autoService;
    }

    /**
     * @param mixed $autoService
     * @return $this
     */
    public function setAutoService($autoService)
    {
        $this->autoService = $autoService;
        return $this;
    }
}
