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
    protected $name;

    /**
     * @var
     *
     * @ORM\Column(name="event_element", type="integer")
     *
     * @ORM\OneToMany(targetEntity="EventElement", mappedBy="event", cascade={"persist"})
     * @ORM\JoinColumn(name="eventElement_id", referencedColumnName="id")
     */
    protected $eventElement;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="vehicle", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="Vehicle", inversedBy="event")
     * @ORM\JoinColumn(name="vehicle_id", referencedColumnName="id")
     */
    protected $vehicle;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="date", type="date")
     */
    protected $date;

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
     * @param $vehicle
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
     * @return \stdClass
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
     * @return ArrayCollection
     */
    public function getEventElement()
    {
        return $this->eventElement;
    }

    /**
     * @param $eventElement
     * @return Event
     */
    public function setEventElement($eventElement)
    {
        $this->eventElement = $eventElement;

        $eventElement->setEvent($this);

        return $this;
    }

    /**
     * @param EventElement $eventElement
     */
    public function addEventElement($eventElement)
    {
        $eventElement->setEvent($this);

        $this->eventElement->add($eventElement);
    }

    /**
     * @param EventElement $eventElement
     */
    public function removeEventElement(EventElement $eventElement)
    {
        $this->eventElement->removeElement($eventElement);
    }
}
