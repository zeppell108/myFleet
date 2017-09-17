<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventRepository")
 */
class Event
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
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var int
     *
     * @ORM\Column(name="event_element", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="EventElement", inversedBy="event")
     * @ORM\JoinColumn(name="event_element_id", referencedColumnName="id")
     */
    private $eventElement;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="vehicle", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="Vehicle", inversedBy="event")
     * @ORM\JoinColumn(name="vehicle_id", referencedColumnName="id")
     */
    private $vehicle;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    private $date;

    /**
     * Event constructor.
     */
    public function __construct()
    {
        $this->eventElement = new ArrayCollection();
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
     * Set name
     *
     * @param string $name
     * @return Event
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
     * Set vehicle
     *
     * @param integer $vehicle
     * @return Event
     */
    public function setVehicle($vehicle)
    {
        $this->vehicle = $vehicle;

        return $this;
    }

    /**
     * Get vehicle
     *
     * @return integer 
     */
    public function getVehicle()
    {
        return $this->vehicle;
    }

    /**
     * Set date
     *
     * @param DateTime $date
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @return int
     */
    public function getEventElement()
    {
        return $this->eventElement;
    }

    /**
     * @param int $eventElement
     * @return Event
     */
    public function setEventElement(int $eventElement)
    {
        $this->eventElement = $eventElement;

        return $this;
    }
}
