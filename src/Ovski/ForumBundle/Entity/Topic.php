<?php

namespace Ovski\ForumBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Ovski\ToolsBundle\Tools\Utils;

/**
 * Topic
 *
 * @ORM\Table(name="forum_topic",
 *     uniqueConstraints={
 *         @ORM\UniqueConstraint(
 *             name="name_language_association_idx",
 *             columns={"title", "category_id"}),
 *         @ORM\UniqueConstraint(
 *             name="slug_language_association_idx",
 *             columns={"slug", "category_id"})
 *     }
 * )
 * @ORM\Entity(repositoryClass="Ovski\ForumBundle\Repository\TopicRepository")
 * @ORM\HasLifecycleCallbacks
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
     * @ORM\Column(type="string", length=40)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40)
     */
    private $numPosts;
    
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @ORM\OneToMany(targetEntity="Ovski\ForumBundle\Entity\Post", mappedBy="topic", cascade={"persist", "remove"})
     */
    private $posts;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\ForumBundle\Entity\Category", inversedBy="topics", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     */
    private $category;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\MinecraftUserBundle\Entity\User", inversedBy="topics", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     */
    private $author;

    /**
     * @ORM\PreUpdate()
     * @ORM\PrePersist()
     */
    public function update()
    {
        $this->setSlug(Utils::slugify($this->getTitle()));
        $this->setUpdatedAt(new \DateTime('now'));
        $this->numPosts++;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->posts = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numPosts = 0;
    }

    /**
     * Set the first post on topic creation
     *
     * @param \Ovski\ForumBundle\Entity\Post $post
     * @return Topic
     */
    public function setPost(\Ovski\ForumBundle\Entity\Post $post)
    {
        $posts = $this->getPosts();
        $posts[0] = $post;
   
        return $this;
    }

    /**
     * Get the first post on topic creation
     *
     * @return \Ovski\ForumBundle\Entity\Post $post
     */
    public function getPost()
    {
        return $this->posts[0];
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
     * Set title
     *
     * @param string $title
     * @return Topic
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set numPosts
     *
     * @param string $numPosts
     * @return Topic
     */
    public function setNumPosts($numPosts)
    {
        $this->numPosts = $numPosts;
    
        return $this;
    }

    /**
     * Get numPosts
     *
     * @return string 
     */
    public function getNumPosts()
    {
        return $this->numPosts;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Topic
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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Topic
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
    
        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
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