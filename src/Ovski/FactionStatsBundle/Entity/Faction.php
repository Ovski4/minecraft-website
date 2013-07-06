<?php

namespace Ovski\FactionStatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faction
 *
 * @ORM\Table(name="faction")
 * @ORM\Entity(repositoryClass="Ovski\FactionStatsBundle\Repository\FactionRepository")
 */
class Faction
{
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
     * @ORM\Column(type="string", length=25)
     */
    private $description;
    
    /**
    * @ORM\OneToMany(targetEntity="Ovski\PlayerStatsBundle\Entity\Player", mappedBy="faction")
    */
    private $players;

    /**
     * @ORM\ManyToMany(targetEntity="Faction", mappedBy="myTruceFactions")
     **/
    private $truceFactionsWithMe;

    /**
     * @ORM\ManyToMany(targetEntity="Faction", inversedBy="truceFactionsWithMe")
     * @ORM\JoinTable(name="faction_truce_relationships",
     *      joinColumns={@ORM\JoinColumn(name="faction_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="truce_faction_id", referencedColumnName="id")}
     *      )
     **/
    private $myTruceFactions;
 
     /**
     * @ORM\ManyToMany(targetEntity="Faction", mappedBy="myAllyFactions")
     **/
    private $allyFactionsWithMe;

    /**
     * @ORM\ManyToMany(targetEntity="Faction", inversedBy="allyFactionsWithMe")
     * @ORM\JoinTable(name="faction_ally_relationships",
     *      joinColumns={@ORM\JoinColumn(name="faction_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="ally_faction_id", referencedColumnName="id")}
     *      )
     **/
    private $myAllyFactions;

    /**
     * @ORM\ManyToMany(targetEntity="Faction", mappedBy="myEnemyFactions")
     **/
    private $enemyFactionsWithMe;

    /**
     * @ORM\ManyToMany(targetEntity="Faction", inversedBy="enemyFactionsWithMe")
     * @ORM\JoinTable(name="faction_enemy_relationships",
     *      joinColumns={@ORM\JoinColumn(name="faction_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="enemy_faction_id", referencedColumnName="id")}
     *      )
     **/
    private $myEnemyFactions;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->players = new \Doctrine\Common\Collections\ArrayCollection();
        $this->truceFactionsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myTruceFactions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->allyFactionsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myAllyFactions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->enemyFactionsWithMe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->myEnemyFactions = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add players
     *
     * @param \Ovski\PlayerStatsBundle\Entity\Player $players
     * @return Faction
     */
    public function addPlayer(\Ovski\PlayerStatsBundle\Entity\Player $players)
    {
        $this->players[] = $players;
    
        return $this;
    }

    /**
     * Remove players
     *
     * @param \Ovski\PlayerStatsBundle\Entity\Player $players
     */
    public function removePlayer(\Ovski\PlayerStatsBundle\Entity\Player $players)
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
     * Add truceFactionsWithMe
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $truceFactionsWithMe
     * @return Faction
     */
    public function addTruceFactionsWithMe(\Ovski\FactionStatsBundle\Entity\Faction $truceFactionsWithMe)
    {
        $this->truceFactionsWithMe[] = $truceFactionsWithMe;
    
        return $this;
    }

    /**
     * Remove truceFactionsWithMe
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $truceFactionsWithMe
     */
    public function removeTruceFactionsWithMe(\Ovski\FactionStatsBundle\Entity\Faction $truceFactionsWithMe)
    {
        $this->truceFactionsWithMe->removeElement($truceFactionsWithMe);
    }

    /**
     * Get truceFactionsWithMe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTruceFactionsWithMe()
    {
        return $this->truceFactionsWithMe;
    }

    /**
     * Add myTruceFactions
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $myTruceFactions
     * @return Faction
     */
    public function addMyTruceFaction(\Ovski\FactionStatsBundle\Entity\Faction $myTruceFactions)
    {
        $this->myTruceFactions[] = $myTruceFactions;
    
        return $this;
    }

    /**
     * Remove myTruceFactions
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $myTruceFactions
     */
    public function removeMyTruceFaction(\Ovski\FactionStatsBundle\Entity\Faction $myTruceFactions)
    {
        $this->myTruceFactions->removeElement($myTruceFactions);
    }

    /**
     * Get myTruceFactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMyTruceFactions()
    {
        return $this->myTruceFactions;
    }

    /**
     * Add allyFactionsWithMe
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $allyFactionsWithMe
     * @return Faction
     */
    public function addAllyFactionsWithMe(\Ovski\FactionStatsBundle\Entity\Faction $allyFactionsWithMe)
    {
        $this->allyFactionsWithMe[] = $allyFactionsWithMe;
    
        return $this;
    }

    /**
     * Remove allyFactionsWithMe
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $allyFactionsWithMe
     */
    public function removeAllyFactionsWithMe(\Ovski\FactionStatsBundle\Entity\Faction $allyFactionsWithMe)
    {
        $this->allyFactionsWithMe->removeElement($allyFactionsWithMe);
    }

    /**
     * Get allyFactionsWithMe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAllyFactionsWithMe()
    {
        return $this->allyFactionsWithMe;
    }

    /**
     * Add myAllyFactions
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $myAllyFactions
     * @return Faction
     */
    public function addMyAllyFaction(\Ovski\FactionStatsBundle\Entity\Faction $myAllyFactions)
    {
        $this->myAllyFactions[] = $myAllyFactions;
    
        return $this;
    }

    /**
     * Remove myAllyFactions
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $myAllyFactions
     */
    public function removeMyAllyFaction(\Ovski\FactionStatsBundle\Entity\Faction $myAllyFactions)
    {
        $this->myAllyFactions->removeElement($myAllyFactions);
    }

    /**
     * Get myAllyFactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMyAllyFactions()
    {
        return $this->myAllyFactions;
    }

    /**
     * Add enemyFactionsWithMe
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $enemyFactionsWithMe
     * @return Faction
     */
    public function addEnemyFactionsWithMe(\Ovski\FactionStatsBundle\Entity\Faction $enemyFactionsWithMe)
    {
        $this->enemyFactionsWithMe[] = $enemyFactionsWithMe;
    
        return $this;
    }

    /**
     * Remove enemyFactionsWithMe
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $enemyFactionsWithMe
     */
    public function removeEnemyFactionsWithMe(\Ovski\FactionStatsBundle\Entity\Faction $enemyFactionsWithMe)
    {
        $this->enemyFactionsWithMe->removeElement($enemyFactionsWithMe);
    }

    /**
     * Get enemyFactionsWithMe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEnemyFactionsWithMe()
    {
        return $this->enemyFactionsWithMe;
    }

    /**
     * Add myEnemyFactions
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $myEnemyFactions
     * @return Faction
     */
    public function addMyEnemyFaction(\Ovski\FactionStatsBundle\Entity\Faction $myEnemyFactions)
    {
        $this->myEnemyFactions[] = $myEnemyFactions;
    
        return $this;
    }

    /**
     * Remove myEnemyFactions
     *
     * @param \Ovski\FactionStatsBundle\Entity\Faction $myEnemyFactions
     */
    public function removeMyEnemyFaction(\Ovski\FactionStatsBundle\Entity\Faction $myEnemyFactions)
    {
        $this->myEnemyFactions->removeElement($myEnemyFactions);
    }

    /**
     * Get myEnemyFactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMyEnemyFactions()
    {
        return $this->myEnemyFactions;
    }
}