<?php

namespace COMMANDEPHOTO\AdminBundle\Repository;

/**
 * PhotoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PhotoRepository extends \Doctrine\ORM\EntityRepository
{
    public function findPhoto($uai,$numero)
    {
        $query = $this->_em->createQuery('SELECT p FROM COMMANDEPHOTO\AdminBundle\Entity\Photo p where p.uai =:uai and p.portrait like :numero');
        $query->setParameter('uai',$uai);
        $query->setParameter('numero','%'.$numero.'%');
        return $query->getSingleResult();
    }
}
