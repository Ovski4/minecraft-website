<?php

namespace Ovski\ForumBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * TopicRepository
 */
class TopicRepository extends EntityRepository
{
    public function getAllTopicsQueryBuilder($categoryId)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb
            ->select('t.title', 't.updatedAt', 't.slug', 't.numPosts', 'u.username')
            ->from('OvskiForumBundle:Topic', 't')
            ->innerJoin('t.author', 'u')
            ->where($qb->expr()->eq('t.category', $categoryId))
            ->orderBy('t.updatedAt', 'DESC')
        ;

        return $qb;
    }

    public function getAllTopicsQuery($categoryId)
    {
        $qb = $this->getAllTopicsQueryBuilder($categoryId);

        return is_null($qb) ? $qb : $qb->getQuery();
    }

    public function getAllTopics($categoryId)
    {
        $q = $this->getAllTopicsQuery($categoryId);

        return is_null($q) ? array() : $q->getResult();
    }

    public function getTopicBySlugAndCategoryIdQueryBuilder($categoryId, $slug)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb
            ->select('t')
            ->from('OvskiForumBundle:Topic', 't')
            ->where($qb->expr()->eq('t.category', $categoryId))
            ->andWhere('t.slug = :slug')
            ->setParameter('slug', $slug)
        ;

        return $qb;
    }

    public function getTopicBySlugAndCategoryIdQuery($categoryId, $slug)
    {
        $qb = $this->getTopicBySlugAndCategoryIdQueryBuilder($categoryId, $slug);

        return is_null($qb) ? $qb : $qb->getQuery();
    }

    public function getTopicBySlugAndCategoryId($categoryId, $slug)
    {
        $q = $this->getTopicBySlugAndCategoryIdQuery($categoryId, $slug);

        return is_null($q) ? array() : $q->getSingleResult();
    }

    public function getTopicIdQueryBuilder($categoryId, $slug)
    {
        $qb = $this->getEntityManager()->createQueryBuilder();
        $qb->select('t.id')
           ->from('OvskiForumBundle:Topic', 't')
           ->where('t.slug = :slug')
           ->setParameter('slug', $slug)
           ->andWhere('t.category = :categoryId')
           ->setParameter('categoryId', $categoryId)
        ;

        return $qb;
    }

    public function getTopicIdQuery($categoryId, $slug)
    {
        $qb = $this->getTopicIdQueryBuilder($categoryId, $slug);

        return is_null($qb) ? $qb : $qb->getQuery();
    }

    public function getTopicId($categoryId, $slug)
    {
        $q = $this->getTopicIdQuery($categoryId, $slug);

        if (is_null($q)) {
            return null;
        } else {
            $arraySingleResult = $q->getSingleResult();

            return $arraySingleResult["id"];
        }
    }
}