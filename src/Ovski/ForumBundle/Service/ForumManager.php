<?php

namespace Ovski\ForumBundle\Service;

/**
 * ForumManager
 */
class ForumManager
{
    private $entityManager;
    private $securityContext;

    public function __construct($entityManager, $securityContext)
    {
        $this->entityManager = $entityManager;
        $this->securityContext = $securityContext;
    }

    /**
     * Get security context
     *
     * @return SecurityContext
     */
    protected function getSecurityContext()
    {
        return $this->securityContext;
    }

    /**
     * Get entity manager
     * 
     * @return EntityManager
     */
    protected function getEntityManager()
    {
        return $this->entityManager;
    }

    /**
     * Get the current user
     * 
     * @return User
     */
    protected function getUser()
    {
        return $this->getSecurityContext()->getToken()->getUser();
    }
    
    /**
     * Handle topic data
     * Take care of setting data on a new topic
     * 
     * @param Topic $topic
     * @param Category $category
     */
    public function handleTopicData($topic, $category)
    {
        $topic
            ->setCategory($category)
            ->setAuthor($this->getUser())
            ->getPost()
            ->setTopic($topic)
            ->setAuthor($this->getUser())
        ;

        $this->getEntityManager()->persist($topic);
        $this->getEntityManager()->flush();

        return $topic;
    }

    /**
     * Handle post data
     * Take care of setting data on a new post
     * 
     * @param Post $post
     * @param Topic $topic
     */
    public function handlePostData($post, $topic)
    {
        $em = $this->getEntityManager();
        $post->setAuthor($this->getUser())->setTopic($topic);
        $this->getUser()->incrementNumPosts();
        $topic->setUpdatedAt(new \DateTime());
        $em->persist($post);
        //$em->persist($topic); automatically done? todo test
        $em->flush();
        
        return $post;
    }

    /* Repository shortcuts functions */
    
    public function getCategories($locale)
    {
        return $this
            ->getEntityManager()
            ->getRepository("OvskiForumBundle:Category")
            ->findBy(array('language' => $locale))
        ;
    }

    public function getCategory($locale, $slug)
    {
        return $this
            ->getEntityManager()
            ->getRepository("OvskiForumBundle:Category")
            ->findOneBy(array('language' => $locale, 'slug' => $slug))
        ;
    }

    public function getCategoryId($locale, $slug)
    {
        return $this
            ->getEntityManager()
            ->getRepository("OvskiForumBundle:Category")
            ->getCategoryId($locale, $slug)
        ;
    }

    public function getTopics($categoryId)
    {
        return $this
            ->getEntityManager()
            ->getRepository("OvskiForumBundle:Topic")
            ->findBy(array('category' => $categoryId), array('updatedAt' => 'desc'))
        ;
    }

    public function getTopic($categoryId, $slug)
    {
        return $this
            ->getEntityManager()
            ->getRepository("OvskiForumBundle:Topic")
            ->findOneBy(array('category' => $categoryId, 'slug' => $slug))
        ;
    }

    public function getTopicId($categoryId, $slug)
    {
        return $this
            ->getEntityManager()
            ->getRepository("OvskiForumBundle:Topic")
            ->getTopicId($categoryId, $slug)
        ;
    }

    public function getLastPosts($topicId, $numPosts)
    {
        return $this
            ->getEntityManager()
            ->getRepository("OvskiForumBundle:Post")
            ->getLastPosts($topicId, $numPosts)
        ;
    }

    public function getPostsByStatus($topicId, $status)
    {
        return $this
            ->getEntityManager()
            ->getRepository("OvskiForumBundle:Post")
            ->getPostsByStatus($topicId, $status)
        ;
    }
    
}