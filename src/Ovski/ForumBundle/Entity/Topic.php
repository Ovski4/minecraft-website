<?php

namespace Ovski\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Topic
 *
 * @ORM\Table(name="forum_topic")
 * @ORM\Entity(repositoryClass="Ovski\ForumBundle\Repository\TopicRepository")
 */
class Topic
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
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity="Ovski\ForumBundle\Entity\Post", mappedBy="topic")
     */
    private $posts;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\ForumBundle\Entity\Category", inversedBy="topics", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\MinecraftUserBundle\Entity\User", inversedBy="topics", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="faction_id", referencedColumnName="id")
     */
    private $author;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Set id
     *
     * @param string $id
     * @return Topic
     */
    public function setId($id)
    {
        $this->id = $id;
    
        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Topic
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
     * Set description
     *
     * @param string $description
     * @return Topic
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
     * Add posts
     *
     * @param \Ovski\ForumBundle\Entity\Post $posts
     * @return Topic
     */
    public function addPost(\Ovski\ForumBundle\Entity\Post $posts)
    {
        $this->posts[] = $posts;
    
        return $this;
    }

    /**
     * Remove posts
     *
     * @param \Ovski\ForumBundle\Entity\Post $posts
     */
    public function removePost(\Ovski\ForumBundle\Entity\Post $posts)
    {
        $this->posts->removeElement($posts);
    }

    /**
     * Get posts
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * Set category
     *
     * @param \Ovski\ForumBundle\Entity\Category $category
     * @return Topic
     */
    public function setCategory(\Ovski\ForumBundle\Entity\Category $category = null)
    {
        $this->category = $category;
    
        return $this;
    }

    /**
     * Get category
     *
     * @return \Ovski\ForumBundle\Entity\Category 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set author
     *
     * @param \Ovski\MinecraftUserBundle\Entity\User $author
     * @return Topic
     */
    public function setAuthor(\Ovski\MinecraftUserBundle\Entity\User $author = null)
    {
        $this->author = $author;
    
        return $this;
    }

    /**
     * Get author
     *
     * @return \Ovski\MinecraftUserBundle\Entity\User 
     */
    public function getAuthor()
    {
        return $this->author;
    }
}