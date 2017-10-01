<?php

namespace AppBundle\Entity;

use DateTime;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Date;

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
     * @ORM\Column(name="event_element", type="object")
     *
     * @ORM\OneToMany(targetEntity="EventElement", mappedBy="event", cascade={"persist"})
     * @ORM\JoinColumn(name="eventElement_id", referencedColumnName="id")
     */
    protected $eventElement;

    /**
     * @var int
     *
     * @ORM\Column(name="vehicle_id", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="Vehicle")
     * @ORM\JoinColumn(name="vehicle_id", referencedColumnName="id")
     */
    protected $vehicle;

    /**
     * @var int
     *
     * @ORM\Column(name="auto_service_id", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="AutoService")
     * @ORM\JoinColumn(name="auto_service_id", referencedColumnName="id")
     */
    protected $autoService;

    /**
     * @var Date
     *
     * @ORM\Column(name="date", type="date")
     */
    protected $date;

//    public function __toString()
//    {
//        return $this->name;
//    }

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
        return $this;
    }

    /**
     * @param EventElement $eventElement
     */
    public function addEventElement(EventElement $eventElement)
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

    /**
     * @return int
     */
    public function getAutoService()
    {
        return $this->autoService;
    }

    /**
     * @param $autoService
     * @return $this
     */
    public function setAutoService($autoService)
    {
        $this->autoService = $autoService;
        return $this;
    }
}
