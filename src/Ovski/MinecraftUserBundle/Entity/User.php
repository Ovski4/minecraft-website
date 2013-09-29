<?php

namespace Ovski\MinecraftUserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Ovski\ToolsBundle\Tools\Hashids;

/**
 * @ORM\Entity(repositoryClass="Ovski\MinecraftUserBundle\Repository\UserRepository")
 * @ORM\Table(name="minecraft_user")
 * @ORM\HasLifecycleCallbacks
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Ovski\ForumBundle\Entity\Topic", mappedBy="author")
     */
    private $topics;

    /**
     * @ORM\OneToMany(targetEntity="Ovski\ForumBundle\Entity\Post", mappedBy="author")
     */
    private $posts;

    /**
     * @ORM\OneToOne(targetEntity="Ovski\MinecraftStatsBundle\Entity\Player", inversedBy="user", cascade={"persist"})
     * @ORM\JoinColumn(name="player_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $player;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $serverKey;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=40)
     */
    private $numPosts;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $country;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", length=3, nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        $this->numPosts = 0;
        $this->createdAt = new \DateTime('now');
    }

    /**
     * Set serverKey
     *
     * @ORM\PrePersist()
     */
    public function setServerKey()
    {
        $time = new \DateTime('now');
        $stringToEncode = sprintf("%so%sv%ss",
            $this->getCreatedAt()->getTimestamp(),
            $this->getUsername(),
            $time->getTimestamp()
        );

        $hashids = new Hashids($stringToEncode);
        $this->serverKey = $hashids->encrypt(1, 2, 5);

        return $this;
    }

    /**
     * Convert a dateTime object to a number of days
     * 
     * @param \DateTime $date
     * @return integer : the number of days
     */
    public function DateTimeToDays(\DateTime $date)
    {
        //TODO
    }

    /**
     * Increment numPosts
     */
    public function incrementNumPosts()
    {
        $this->numPosts++;
    }

    /**
     * Set numPosts
     *
     * @param string $numPosts
     * @return User
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
     * Set country
     *
     * @param string $country
     * @return User
     */
    public function setCountry($country)
    {
        $this->country = $country;
    
        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Add topics
     *
     * @param \Ovski\ForumBundle\Entity\Topic $topics
     * @return User
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

    /**
     * Add posts
     *
     * @param \Ovski\ForumBundle\Entity\Post $posts
     * @return User
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return User
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;
    
        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
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
     * Set player
     *
     * @param \Ovski\MinecraftStatsBundle\Entity\Player $player
     * @return User
     */
    public function setPlayer(\Ovski\MinecraftStatsBundle\Entity\Player $player = null)
    {
        $this->player = $player;
        if (!$this->getPlayer()->getUser()) {
            $this->getPlayer()->setUser($this);
        }

        return $this;
    }

    /**
     * Get player
     *
     * @return \Ovski\MinecraftStatsBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Get serverKey
     *
     * @return string 
     */
    public function getServerKey()
    {
        return $this->serverKey;
    }
}