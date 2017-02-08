<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;
/**
 * ProduitRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProduitRepository extends EntityRepository
{
   /**
Stock au detail par produit
stock en gros par produit
moyenne de vente par jour par produit
moyenne ecart de livraison par produit
  */
	public function stockParProduit ($region=null, $startDate=null, $endDate=null){

        $qb = $this->createQueryBuilder('p')->join('p.situations','s')->join('s.visite','v')->join('v.pointVente','pv');
        if($region!=null){
           $qb->where('pv.ville=:ville')
          ->setParameter('ville', $region);
          }
          if($startDate!=null){
           $qb->andWhere('v.date>=:startDate')->setParameter('startDate', new \DateTime($startDate));
          }
          if($endDate!=null){
           $qb->andWhere('v.date<=:endDate')->setParameter('endDate',new \DateTime($endDate));
          }
           $qb->addSelect('p.nom');
           $qb->addSelect('sum(s.stock) as stock');
           $qb->addSelect('sum(s.stockG) as stockG');
           $qb->addSelect('sum(s.mvj) as mvj');
           $qb->addSelect('avg(s.ecl) as ecl'); 
            $qb->addGroupBy('p.id');
           try {  
          return $qb->getQuery()->getArrayResult();
          } catch (NoResultException $e) {
            return array();
        }
     
  }
 /**
A corriger: en cas de plusieur visite par point de vente ca fausse
  */
	public function visibilitekParProduit ($region=null, $startDate=null, $endDate=null){

        $qb = $this->createQueryBuilder('p')->join('p.situations','s')->join('s.visite','v')->join('v.pointVente','pv');
        if($region!=null){
           $qb->where('pv.ville=:ville')
          ->setParameter('ville', $region);
          }
          if($startDate!=null){
           $qb->andWhere('v.date>=:startDate')->setParameter('startDate', new \DateTime($startDate));
          }
          if($endDate!=null){
           $qb->andWhere('v.date<=:endDate')->setParameter('endDate',new \DateTime($endDate));
          }

          $qb->addGroupBy('p.id');
          $qb->addSelect('p.nom');
          $qb->addSelect('count(s.map) as map');
          $qb->addSelect('count(s.aff) as aff');
          $qb->addSelect('count(s.pre)as pre');   
          try {  
          return $qb->getQuery()->getArrayResult();
          } catch (NoResultException $e) {
            return array();
        }
     
  }	  
 /**
  *Nombre de point de vente qui respectent le prix au detail par produit
  * Nombre de point de vente qui respectent le prix en gros par produit
  */
 	public function respectPrixParProduit ($region=null, $startDate=null, $endDate=null){

        $qb = $this->createQueryBuilder('p')->join('p.situations','s')->join('s.visite','v')->join('v.pointVente','pv');
        if($region!=null){
           $qb->where('pv.ville=:ville')
          ->setParameter('ville', $region);
          }
          if($startDate!=null){
           $qb->andWhere('v.date>=:startDate')->setParameter('startDate', new \DateTime($startDate));
          }
          if($endDate!=null){
           $qb->andWhere('v.date<=:endDate')->setParameter('endDate',new \DateTime($endDate));
          }
          $qb->addGroupBy('p.id');
           $qb->addSelect('p.nom');
          $qb->addSelect('count(s.rpd) as rpd');
          $qb->addSelect('count(s.rpp) as rpp');
          try {  
          return $qb->getQuery()->getArrayResult();
          } catch (NoResultException $e) {
            return array();
        }
     
  }


  public function situationsComparee ($region=null, $startDate=null, $endDate=null){
    $em = $this->_em;
    $RAW_QUERY =($region!=null) ?'select * from (select p.id, p.nom, count(s.map) as map,count(s.pre) as pre, count(s.rpp) as rpp, count(s.rpd) as rpd, sum(s.stock) as sd, sum(s.stockg) as sg, sum(s.mvj) as mvj, avg(s.ecl) as ecl from (select v.id,v.date from (select pv.id as pv , max(v.date) as date from point_vente pv join visite v  on pv.id=v.point_vente_id and v.date>=:startDate and v.date<=:endDate and pv.ville=:region group by  pv.id order by pv.id) as u  join  visite v on (u.pv=v.point_vente_id and u.date=v.date) ) as v join situation s on v.id=s.visite_id join (select p.nom, p.id, c.nom as nomCon from produit p left join produit c on p.concurent_id=c.id) p on p.id=s.produit_id group by p.nom,p.id) produit left join  (select  p.nom as nomCon, count(s.map) as mapCon, count(s.pre) as preCon, count(s.rpp) as rppCon, count(s.rpd) as rpdCon, sum( s.stock) as sdCon, sum(s.stockg) as sgCon, sum(s.mvj) as mvjCon, avg(s.ecl) as eclCon from (select v.id,v.date from (select pv.id as pv , max(v.date) as date from point_vente pv join visite v  on pv.id=v.point_vente_id and v.date>=:startDate and v.date<=:endDate and pv.ville=:region group by  pv.id order by pv.id) as u  join  visite v on (u.pv=v.point_vente_id and u.date=v.date) ) as v join situation s on v.id=s.visite_id join produit p on p.id=s.produit_id group by p.id, p.nom ) tchalenger on  produit.nomCon=tchalenger.nomCon;
'  : 'select * from (select p.id, p.nom,count(s.map) as map, count(s.rpp) as rpp,count(s.pre) as pre, count(s.rpd) as rpd, sum(s.stock) as sd, sum(s.stockg) as sg, sum(s.mvj) as mvj, avg(s.ecl) as ecl from (select v.id,v.date from (select pv.id as pv , max(v.date) as date from point_vente pv join visite v  on pv.id=v.point_vente_id and v.date>=:startDate and v.date<=:endDate group by  pv.id order by pv.id) as u  join  visite v on (u.pv=v.point_vente_id and u.date=v.date) ) as v join situation s on v.id=s.visite_id join (select p.nom, p.id, c.nom as nomCon from produit p left join produit c on p.concurent_id=c.id) p on p.id=s.produit_id group by p.nom,p.id) produit left join  (select  p.nom as nomCon, count(s.map) as mapCon, count(s.pre) as preCon, count(s.rpp) as rppCon, count(s.rpd) as rpdCon, sum( s.stock) as sdCon, sum(s.stockg) as sgCon, sum(s.mvj) as mvjCon, avg(s.ecl) as eclCon from (select v.id,v.date from (select pv.id as pv , max(v.date) as date from point_vente pv join visite v  on pv.id=v.point_vente_id and v.date>=:startDate and v.date<=:endDate group by  pv.id order by pv.id) as u  join  visite v on (u.pv=v.point_vente_id and u.date=v.date) ) as v join situation s on v.id=s.visite_id join produit p on p.id=s.produit_id group by p.id, p.nom ) tchalenger on  produit.nomCon=tchalenger.nomCon;
'; 
  $statement = $em->getConnection()->prepare($RAW_QUERY);
        if($region!=null){
   $statement->bindValue('region', $region);
          }
    $startDate=new \DateTime($startDate);
    $endDate=new \DateTime($endDate);

     $statement->bindValue('startDate', $startDate->format('Y-m-d'));
     $statement->bindValue('endDate',  $endDate->format('Y-m-d'));
     $statement->execute();

      return  $result = $statement->fetchAll();
  }	 	
}
