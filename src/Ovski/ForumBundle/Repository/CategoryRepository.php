<?php

namespace Ovski\ForumBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * CategoryRepository
 */
class CategoryRepository extends EntityRepository
{
    public function getCategoriesQueryBuilder($locale)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('c.slug', 'c.name', 'c.description')
           ->from('OvskiForumBundle:Category', 'c')
           ->andWhere('c.language = :locale')
           ->setParameter('locale', $locale)
        ;

        return $qb;
    }

    public function getCategoriesQuery($locale)
    {
        $qb = $this->getCategoriesQueryBuilder($locale);

        return is_null($qb) ? $qb : $qb->getQuery();
    }

    public function getCategories($locale)
    {
        $q = $this->getCategoriesQuery($locale);

        return is_null($q) ? array() : $q->getResult();
    }

    public function getCategoryIdQueryBuilder($locale, $slug)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('c.id')
           ->from('OvskiForumBundle:Category', 'c')
           ->where('c.slug = :slug')
           ->setParameter('slug', $slug)
           ->andWhere('c.language = :locale')
           ->setParameter('locale', $locale)
        ;

        return $qb;
    }

    public function getCategoryIdQuery($locale, $slug)
    {
        $qb = $this->getCategoryIdQueryBuilder($locale, $slug);

        return is_null($qb) ? $qb : $qb->getQuery();
    }

    public function getCategoryId($locale, $slug)
    {
        $q = $this->getCategoryIdQuery($locale, $slug);

        if (is_null($q)) {
            return null;
        } else {
            $arraySingleResult = $q->getSingleResult();

            return $arraySingleResult["id"];
        }
    }
}