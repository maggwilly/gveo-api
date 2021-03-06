<?php

namespace AppBundle\Repository;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends \Doctrine\ORM\EntityRepository
{

public function findByUser($organ)
{
  $qb = $this->createQueryBuilder('u')
     ->where('u.user= :user')->setParameter('user', $organ);   
  return $qb->getQuery()->getResult();
}

}
