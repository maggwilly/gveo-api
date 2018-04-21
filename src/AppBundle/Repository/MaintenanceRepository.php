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

 public function findCoutTotal($uid,$vehicule,\Datetime $startDate,\Datetime $endDate)
{


 $qb = $this->createQueryBuilder('v')->join('v.vehicule','vh')->where('vh.info = :uid') ->setParameter('uid', $uid);
 if ($vehicule!=0) {
    $qb->andWhere('v.vehicule = :vehicule')
 ->setParameter('vehicule', $vehicule);
 }

  $qb->andWhere('v.dateSave BETWEEN :debut AND :fin')
  ->setParameter('debut', $startDate) 
   ->setParameter('fin', $endDate); 
 $qb->select('SUM(v.cout+v.coutMainOeuvre) as coutTotal');
       
 return $qb->getQuery()->getSingleScalarResult();
}
  

}
