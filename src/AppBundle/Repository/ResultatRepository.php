<?php

namespace AppBundle\Repository;

/**
 * ResultatRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ResultatRepository extends \Doctrine\ORM\EntityRepository
{

   /**
  *Nombre de synchro effectue par utilisateur 
  */
  public function findList($start,$all){
    $qb = $this->createQueryBuilder('a')->orderBy('a.id', 'desc');
    $query=$qb->getQuery();
      if($all!='true')
    $query->setFirstResult($start)->setMaxResults(20);
     return $query->getResult();
}	
}