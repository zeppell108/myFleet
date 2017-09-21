<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * ServiceType
 *
 * @ORM\Table(name="service_type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ServiceTypeRepository")
 */
class ServiceType extends Controller
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
     * @ORM\Column(name="name", type="string", length=50, unique=true)
     */
    private $name;

    /**
     * @Assert\Type(type="AppBundle\Entity\EventElement")
     * @Assert\Valid()
     * @ORM\OneToOne(targetEntity="EventElement", inversedBy="serviceType")
     * @ORM\JoinColumn(name="eventElement_id", referencedColumnName="id")
     */
    private $eventElement;

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
     * @return ServiceType
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
     * @return mixed
     */
    public function getEventElement()
    {
        return $this->eventElement;
    }

    /**
     * @param mixed $eventElement
     * @return $this /stdClass
     */
    public function setEventElement(EventElement $eventElement = null)
    {
        $this->eventElement = $eventElement;

        return $this;
    }
}
