<?php

namespace Ovski\ForumBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 */
class CategoryRepository extends EntityRepository
{
    public function findAllCategoriesSlugsNamesDescriptionsByLocaleQueryBuilder($locale)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('c.slug', 'c.name', 'c.description')
           ->from('OvskiForumBundle:Category', 'c')
           ->andWhere('c.language = :locale')
           ->setParameter('locale', $locale)
        ;

        return $qb;
    }

    public function findAllCategoriesSlugsNamesDescriptionsByLocaleQuery($locale)
    {
        $qb = $this->findAllCategoriesSlugsNamesDescriptionsByLocaleQueryBuilder($locale);

        return is_null($qb) ? $qb : $qb->getQuery();
    }

    public function findAllCategoriesSlugsNamesDescriptionsByLocale($locale)
    {
        $q = $this->findAllCategoriesSlugsNamesDescriptionsByLocaleQuery($locale);

        return is_null($q) ? array() : $q->getResult();
    }
}