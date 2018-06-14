<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * PoliceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PoliceRepository extends EntityRepository
{
     public function findLastByVehicule($vehicule)
{
  $qb = $this->createQueryBuilder('r')
  ->where('r.vehicule=:vehicule')
  ->setParameter('vehicule', $vehicule)
  ->orderBy('r.endDate', 'DESC')
  ->setMaxResults(1); 
 return $qb->getQuery()->getOneOrNullResult();

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
 $qb->select('SUM(v.cout) as coutTotal');
       
 return $qb->getQuery()->getSingleScalarResult();
}
  


}
