<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
//use Doctrine\ORM\EntityManagerInterface;

/**
 * ServiceTypeRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ServiceTypeRepository extends EntityRepository
{
    public function getAllServices()
    {
        return $services = $this->getDoctrine()
            ->getRepository('AppBundle:ServiceType')
            ->findBy([], ['id' => 'ASC']);
    }
}
