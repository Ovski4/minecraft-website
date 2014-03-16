<?php

namespace Ovski\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ovski\ToolsBundle\Tools\Utils;

/**
 * Category
 *
 * @ORM\Table(name="forum_category",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(
 *             name="name_language_association_idx",
 *             columns={"name", "language"}),
 *         @ORM\UniqueConstraint(
 *             name="slug_language_association_idx",
 *             columns={"slug", "language"}),
 * 
 *     }
 * )
 * @ORM\Entity(repositoryClass="Ovski\ForumBundle\Repository\CategoryRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Category
{ 
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Ovski\ForumBundle\Entity\Topic", mappedBy="category", cascade={"remove"})
     */
    private $topics;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $language;

    /**
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function updateSlug()
    {
        $this->setSlug(Utils::slugify($this->getName()));
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->topics = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Category
     */
    public function setName($name)
    {
        $this->name = $name;
    
        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Category
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Category
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Category
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Add topics
     *
     * @param \Ovski\ForumBundle\Entity\Topic $topics
     * @return Category
     */
    public function addTopic(\Ovski\ForumBundle\Entity\Topic $topics)
    {
        $this->topics[] = $topics;
    
        return $this;
    }

    /**
     * Remove topics
     *
     * @param \Ovski\ForumBundle\Entity\Topic $topics
     */
    public function removeTopic(\Ovski\ForumBundle\Entity\Topic $topics)
    {
        $this->topics->removeElement($topics);
    }

    /**
     * Get topics
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTopics()
    {
        return $this->topics;
    }
}