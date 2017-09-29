<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections;

/**
 * EventElement
 *
 * @ORM\Table(name="event_element")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventElementRepository")
 */
class EventElement
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
     * @var int
     *
     * @ORM\Column(name="event_id", type="integer")
     *
     * @ORM\ManyToOne(targetEntity="Event", inversedBy="event_element")
     * @ORM\JoinColumn(name="event_id", referencedColumnName="id")
     */
    private $event;

    /**
     * @var \stdClass
     *
     * @ORM\Column(name="serviceType", type="object")
     * @ORM\OneToMany(targetEntity="ServiceType", mappedBy="event_element")
     * @ORM\JoinColumn(name="serviceType_id", referencedColumnName="id")
     */
    private $serviceType;

    /**
     * @var string
     *
     * @Assert\NotBlank()
     * @ORM\Column(name="name", type="string", length=50)
     */
    private $name;

    /**
     * @var float
     *
     * @ORM\Column(name="cost", type="float")
     */
    private $cost;

    /**
     * @var int
     *
     * @ORM\Column(name="kmPeriod", type="smallint", nullable=true)
     */
    private $kmPeriod;

    /**
     * @var int
     *
     * @ORM\Column(name="monthPeriod", type="smallint", nullable=true)
     */
    private $monthPeriod;

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
     * Set event
     *
     * @param $event
     * @return EventElement
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     * @return /stdClass
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * Set serviceType
     *
     * @param integer $serviceType
     * @return EventElement
     */
    public function setServiceType($serviceType)
    {
        $this->serviceType = $serviceType;

        return $this;
    }

    /**
     * Get serviceType
     *
     * @return \stdClass
     */
    public function getServiceType()
    {
        return $this->serviceType;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return EventElement
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
     * Set cost
     *
     * @param float $cost
     * @return EventElement
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return float 
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set kmPeriod
     *
     * @param integer $kmPeriod
     * @return EventElement
     */
    public function setKmPeriod($kmPeriod)
    {
        $this->kmPeriod = $kmPeriod;

        return $this;
    }

    /**
     * Get kmPeriod
     *
     * @return integer 
     */
    public function getKmPeriod()
    {
        return $this->kmPeriod;
    }

    /**
     * Set monthPeriod
     *
     * @param integer $monthPeriod
     * @return EventElement
     */
    public function setMonthPeriod($monthPeriod)
    {
        $this->monthPeriod = $monthPeriod;

        return $this;
    }

    /**
     * Get monthPeriod
     *
     * @return integer 
     */
    public function getMonthPeriod()
    {
        return $this->monthPeriod;
    }

    /**
     * @param Event $event
     */
    public function addEvent(Event $event)
    {
//        echo '<pre>' . var_export($this->event, true) . '</pre>';die();
//        if (!$this->event->contains($event)) {
//            $this->event->add($event);
//        }
        $this->setEvent($event);
    }
}
