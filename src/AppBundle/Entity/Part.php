<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Part
 *
 * @ORM\Table(name="part")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartRepository")
 */
class Part
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
     * @ORM\Column(name="name", type="string", length=100)
     */
    private $name;

    /**
     * @var int
     * @ORM\Column(name="serviceType_id", type="integer")
     * @ORM\ManyToOne(targetEntity="ServiceType")
     * @ORM\JoinColumn(name="auto_service_id", referencedColumnName="id")
     */
    private $serviceType;


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
     * @return Part
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
     * Set serviceType
     *
     * @param integer $serviceType
     * @return Part
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;
        return $this;
    }

    /**
     * Get serviceType
     *
     * @return integer 
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }
}
