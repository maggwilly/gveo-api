<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ReleveRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ReleveRepository extends EntityRepository
{
public function findLastByVehicule($vehicule)
{
  $qb = $this->createQueryBuilder('r')
  ->where('r.vehicule=:vehicule')
  ->setParameter('vehicule', $vehicule)
  ->orderBy('r.dateSave', 'DESC')
  ->setMaxResults(1); 
 return $qb->getQuery()->getOneOrNullResult();
}   
}