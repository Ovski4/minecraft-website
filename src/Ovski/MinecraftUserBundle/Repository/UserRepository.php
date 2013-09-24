<?php

namespace Ovski\MinecraftUserBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UserRepository
 */
class UserRepository extends EntityRepository
{
    public function getEnabledUsersQueryBuilder()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u')
           ->from('OvskiMinecraftUserBundle:User', 'u')
           ->andWhere('u.enabled = 1')
        ;

        return $qb;
    }

    public function getEnabledUsersQuery()
    {
        $qb = $this->getEnabledUsersQueryBuilder();

        return is_null($qb) ? $qb : $qb->getQuery();
    }

    public function getEnabledUsers()
    {
        $q = $this->getEnabledUsersQuery();

        return is_null($q) ? array() : $q->getResult();
    }

    public function getDisabledUsersQueryBuilder()
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('u')
           ->from('OvskiMinecraftUserBundle:User', 'u')
           ->andWhere('u.enabled = 0')
        ;

        return $qb;
    }

    public function getDisabledUsersQuery()
    {
        $qb = $this->getDisabledUsersQueryBuilder();

        return is_null($qb) ? $qb : $qb->getQuery();
    }

    public function getDisabledUsers()
    {
        $q = $this->getDisabledUsersQuery();

        return is_null($q) ? array() : $q->getResult();
    }
}