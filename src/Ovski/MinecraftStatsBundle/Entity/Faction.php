<?php

namespace Ovski\MinecraftStatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faction
 *
 * @ORM\Table(name="minecraft_faction")
 * @ORM\Entity(repositoryClass="Ovski\MinecraftStatsBundle\Repository\FactionRepository")
 * @ORM\HasLifecycleCallbacks
 */
class Faction
{ 
    public static $REMOVE_RELATIONSHIP_MAP = array(
      'ENEMY'   => 'removeEnemyFaction',
      'ALLY'    => 'removeAllyFaction',
      'TRUCE'   => 'removeTruceFaction',
    );

    public static $ADD_RELATIONSHIP_MAP = array(
      'ENEMY'   => 'addEnemyFaction',
      'ALLY'    => 'addAllyFaction',
      'TRUCE'   => 'addTruceFaction',
    );

    /**
     * @var integer
     *
     * @ORM\Column(type="string", name="id")
     * @ORM\Id
     */
    private $id;

    /**
     * @var float
     *
     * @ORM\Column(type="integer", nullable=false)
     */
    private $score;

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
     * @var bigint
     *
     * @ORM\Column(type="bigint", name="created_at")
     */
    private $createdAt;
    
    /**
     * @ORM\Column(type="string", length=255, unique=true, nullable=false)
     */
    private $slug;
    
    /**
     * @ORM\OneToMany(targetEntity="Ovski\MinecraftStatsBundle\Entity\Player", mappedBy="faction")
     */
    private $players;

    /**
     * @ORM\ManyToMany(targetEntity="Faction", cascade={"persist"})
     * @ORM\JoinTable(name="minecraft_faction_truce_relationship",
     *      joinColumns={@ORM\JoinColumn(name="faction_id", referencedColumnName="id")},
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="truce_faction_id", referencedColumnName="id")
     *      })
     **/
    private $truceFactions;
    
    /**
     * @ORM\ManyToMany(targetEntity="Faction", cascade={"persist"})
     * @ORM\JoinTable(name="minecraft_faction_ally_relationship",
     *      joinColumns={@ORM\JoinColumn(name="faction_id", referencedColumnName="id")},
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="ally_faction_id", referencedColumnName="id")
     *      })
     **/
    private $allyFactions;
    
    /**
     * @ORM\ManyToMany(targetEntity="Faction", cascade={"persist"})
     * @ORM\JoinTable(name="minecraft_faction_enemy_relationship",
     *      joinColumns={@ORM\JoinColumn(name="faction_id", referencedColumnName="id")},
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="enemy_faction_id", referencedColumnName="id")
     *      })
     **/
    private $enemyFactions;

    public function __toString()
    {
        return $this->getName();
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
        $this->truceFactions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->allyFactions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->enemyFactions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * @ORM\PrePersist()
     * 
     * @param string $score
     */
    public function setScore()
    {
        $score = 0;
        foreach ($this->players as $player) {
            $score += $player->getScore();
        }

        if (count($this->getEnemyFactions()) == 0) {
            $enemiesScore = 0;
        } else {
            $enemiesScore = $score*(count($this->getEnemyFactions())*10/100);
        }
        if (count($this->getAllyFactions()) == 0) {
            $alliesScore = 0;
        } else {
            $alliesScore = $score*(count($this->getAllyFactions())*10/100);
        }

        $this->score = $score + $enemiesScore - $alliesScore;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return Faction
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
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
     * @return Faction
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
     * @return Faction
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
     * @return Faction
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
     * Set createdAt
     *
     * @param integer $createdAt
     * @return Faction
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return DateTime 
     */
    public function getCreatedAt()
    {
        $seconds = $this->createdAt / 1000;
        $stringDate = date("d-m-Y", $seconds);
        $dateTime = new \DateTime($stringDate);

        return $dateTime;
    }

    /**
     * Add players
     *
     * @param \Ovski\MinecraftStatsBundle\Entity\Player $players
     * @return Faction
     */
    public function addPlayer(\Ovski\MinecraftStatsBundle\Entity\Player $players)
    {
        $this->players[] = $players;

        return $this;
    }

    /**
     * Remove players
     *
     * @param \Ovski\MinecraftStatsBundle\Entity\Player $players
     */
    public function removePlayer(\Ovski\MinecraftStatsBundle\Entity\Player $players)
    {
        $this->players->removeElement($players);
    }

    /**
     * Get players
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPlayers()
    {
        return $this->players;
    }

    /**
     * Add truceFactions
     *
     * @param \Ovski\MinecraftStatsBundle\Entity\Faction $truceFactions
     * @return Faction
     */
    public function addTruceFaction(\Ovski\MinecraftStatsBundle\Entity\Faction $truceFactions)
    {
        $this->truceFactions[] = $truceFactions;

        return $this;
    }

    /**
     * Remove truceFactions
     *
     * @param \Ovski\MinecraftStatsBundle\Entity\Faction $truceFactions
     */
    public function removeTruceFaction(\Ovski\MinecraftStatsBundle\Entity\Faction $truceFactions)
    {
        $this->truceFactions->removeElement($truceFactions);
    }

    /**
     * Get truceFactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTruceFactions()
    {
        return $this->truceFactions;
    }

    /**
     * Add allyFactions
     *
     * @param \Ovski\MinecraftStatsBundle\Entity\Faction $allyFactions
     * @return Faction
     */
    public function addAllyFaction(\Ovski\MinecraftStatsBundle\Entity\Faction $allyFactions)
    {
        $this->allyFactions[] = $allyFactions;

        return $this;
    }

    /**
     * Remove allyFactions
     *
     * @param \Ovski\MinecraftStatsBundle\Entity\Faction $allyFactions
     */
    public function removeAllyFaction(\Ovski\MinecraftStatsBundle\Entity\Faction $allyFactions)
    {
        $this->allyFactions->removeElement($allyFactions);
    }

    /**
     * Get allyFactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAllyFactions()
    {
        return $this->allyFactions;
    }

    /**
     * Add enemyFactions
     *
     * @param \Ovski\MinecraftStatsBundle\Entity\Faction $enemyFactions
     * @return Faction
     */
    public function addEnemyFaction(\Ovski\MinecraftStatsBundle\Entity\Faction $enemyFactions)
    {
        $this->enemyFactions[] = $enemyFactions;

        return $this;
    }

    /**
     * Remove enemyFactions
     *
     * @param \Ovski\MinecraftStatsBundle\Entity\Faction $enemyFactions
     */
    public function removeEnemyFaction(\Ovski\MinecraftStatsBundle\Entity\Faction $enemyFactions)
    {
        $this->enemyFactions->removeElement($enemyFactions);
    }

    /**
     * Get enemyFactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEnemyFactions()
    {
        return $this->enemyFactions;
    }

    /**
     * Check whether a faction is enemy or not
     *
     * @return boolean
     */
    public function isEnemy(Faction $faction)
    {
        if($this->enemyFactions->contains($faction)) {
            return true;
        }
        return false;
    }

    /**
     * Check whether a faction is truce or not
     *
     * @return boolean
     */
    public function isTruce(Faction $faction)
    {
        if($this->truceFactions->contains($faction)) {
            return true;
        }
        return false;
    }

    /**
     * Check whether a faction is ally or not
     *
     * @return boolean
     */
    public function isAlly(Faction $faction)
    {
        if($this->allyFactions->contains($faction)) {
            return true;
        }
        return false;
    }

    /**
     * Get the relationship with the given faction
     * 
     * @param \Ovski\MinecraftStatsBundle\Entity\Faction $faction
     * @return string
     */
    public function getRelationShip(Faction $faction) {
        if($this->isAlly($faction)) {
            return "ALLY";
        } elseif($this->isTruce($faction))  {
            return "TRUCE";
        } elseif($this->isEnemy($faction)) {
            return "ENEMY";
        } else {
            return "NEUTRAL";
        }
    }

    /**
     * Remove the relationship with the given faction
     * 
     * @param \Ovski\MinecraftStatsBundle\Entity\Faction $faction
     */
    public function removeRelationShip(Faction $faction) {
        if($this->getRelationShip($faction) != "NEUTRAL") {
            $removeMethod = self::$REMOVE_RELATIONSHIP_MAP[$this->getRelationShip($faction)];
            self::$removeMethod($faction);
        }
    }

    /**
     * Add a relationship with the given faction
     * 
     * @param \Ovski\MinecraftStatsBundle\Entity\Faction $faction
     * @param string : $relation [TRUCE, ALLY, ENEMY]
     */
    public function addRelationShip(Faction $faction, $relation) {
        $addMethod = self::$ADD_RELATIONSHIP_MAP[$relation];
        self::$addMethod($faction);
    }

    /**
     * Get the number of players in a faction
     * 
     * @return int
     */
    public function getPlayerNumber()
    {
        return count($this->getPlayers);
    }

    /**
     * Get max power a faction can pretend to
     * 
     * @return int
     */
    public function getMaxPower()
    {
        return $this->getPlayerNumber()*10;
    }

    /**
     * Get the power of a faction
     * 
     * @return int
     */
    public function getPower()
    {
        $power = 0;
        foreach ($this->getPlayers() as $player) {
            $power = $power + $player->getPower();
        }

        return $power;
    }
}
