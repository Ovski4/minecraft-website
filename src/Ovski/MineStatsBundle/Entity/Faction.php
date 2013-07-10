<?php

namespace Ovski\MineStatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faction
 *
 * @ORM\Table(name="faction")
 * @ORM\Entity(repositoryClass="Ovski\MineStatsBundle\Repository\FactionRepository")
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
     * @var string
     *
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var bigint
     *
     * @ORM\Column(type="bigint", name="created_at")
     */
    private $createdAt;
    
    /**
     * @ORM\OneToMany(targetEntity="Ovski\MineStatsBundle\Entity\Player", mappedBy="faction")
     */
    private $players;

    /**
     * @ORM\ManyToMany(targetEntity="Faction", cascade={"persist"})
     * @ORM\JoinTable(name="faction_truce_relationship",
     *      joinColumns={@ORM\JoinColumn(name="faction_id", referencedColumnName="id")},
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="truce_faction_id", referencedColumnName="id")
     *      })
     **/
    private $truceFactions;
    
    /**
     * @ORM\ManyToMany(targetEntity="Faction", cascade={"persist"})
     * @ORM\JoinTable(name="faction_ally_relationship",
     *      joinColumns={@ORM\JoinColumn(name="faction_id", referencedColumnName="id")},
     *      inverseJoinColumns={
     *          @ORM\JoinColumn(name="ally_faction_id", referencedColumnName="id")
     *      })
     **/
    private $allyFactions;
    
    /**
     * @ORM\ManyToMany(targetEntity="Faction", cascade={"persist"})
     * @ORM\JoinTable(name="faction_enemy_relationship",
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
     * @return integer 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Add players
     *
     * @param \Ovski\MineStatsBundle\Entity\Player $players
     * @return Faction
     */
    public function addPlayer(\Ovski\MineStatsBundle\Entity\Player $players)
    {
        $this->players[] = $players;

        return $this;
    }

    /**
     * Remove players
     *
     * @param \Ovski\MineStatsBundle\Entity\Player $players
     */
    public function removePlayer(\Ovski\MineStatsBundle\Entity\Player $players)
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
     * @param \Ovski\MineStatsBundle\Entity\Faction $truceFactions
     * @return Faction
     */
    public function addTruceFaction(\Ovski\MineStatsBundle\Entity\Faction $truceFactions)
    {
        $this->truceFactions[] = $truceFactions;

        return $this;
    }

    /**
     * Remove truceFactions
     *
     * @param \Ovski\MineStatsBundle\Entity\Faction $truceFactions
     */
    public function removeTruceFaction(\Ovski\MineStatsBundle\Entity\Faction $truceFactions)
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
     * @param \Ovski\MineStatsBundle\Entity\Faction $allyFactions
     * @return Faction
     */
    public function addAllyFaction(\Ovski\MineStatsBundle\Entity\Faction $allyFactions)
    {
        $this->allyFactions[] = $allyFactions;

        return $this;
    }

    /**
     * Remove allyFactions
     *
     * @param \Ovski\MineStatsBundle\Entity\Faction $allyFactions
     */
    public function removeAllyFaction(\Ovski\MineStatsBundle\Entity\Faction $allyFactions)
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
     * @param \Ovski\MineStatsBundle\Entity\Faction $enemyFactions
     * @return Faction
     */
    public function addEnemyFaction(\Ovski\MineStatsBundle\Entity\Faction $enemyFactions)
    {
        $this->enemyFactions[] = $enemyFactions;

        return $this;
    }

    /**
     * Remove enemyFactions
     *
     * @param \Ovski\MineStatsBundle\Entity\Faction $enemyFactions
     */
    public function removeEnemyFaction(\Ovski\MineStatsBundle\Entity\Faction $enemyFactions)
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
     * @param \Ovski\MineStatsBundle\Entity\Faction $faction
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

    public function removeRelationShip(Faction $faction) {
        if($this->getRelationShip($faction) != "NEUTRAL") {
            $removeMethod = self::$REMOVE_RELATIONSHIP_MAP[$this->getRelationShip($faction)];
            self::$removeMethod($faction);
        }
    }

    public function addRelationShip(Faction $faction, $relation) {
        $addMethod = self::$ADD_RELATIONSHIP_MAP[$relation];
        self::$addMethod($faction);
    }
}
