<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MaintenanceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MaintenanceRepository extends EntityRepository
{

 public function findByVehicule($vehicule,$systeme)
{
  $qb = $this->createQueryBuilder('r')
  ->where('r.systeme=:systeme')
  ->andWhere('r.vehicule=:vehicule')
  ->setParameter('systeme', $systeme)
  ->setParameter('vehicule', $vehicule); 
   $qb->orderBy('r.dateSave', 'DESC');   
 return $qb->getQuery()->getResult();

}

 public function findCoutTotal($vehicule,$annee=false)
{


 $qb = $this->createQueryBuilder('v')
 ->andWhere('v.vehicule = :vehicule')
 ->setParameter('vehicule', $vehicule);
 if ($annee) {
  $qb->andWhere('v.dateSave BETWEEN :debut AND :fin')
  ->setParameter('debut', new \Datetime(date('Y').'-01-01')) //
   ->setParameter('fin', new \Datetime(date('Y').'-12-31')); //
 }
 $qb->select('SUM(v.cout+v.coutMainOeuvre) as coutTotal');
       
 return $qb->getQuery()->getSingleScalarResult();
}
  

}
