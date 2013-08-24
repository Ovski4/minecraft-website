<?php

namespace Ovski\MineStatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="Ovski\MineStatsBundle\Repository\PlayerRepository")
 */
class Player
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\MineStatsBundle\Entity\Faction", inversedBy="players", cascade={"persist", "remove"})
     * @ORM\JoinColumn(name="faction_id", referencedColumnName="id", nullable=true, onDelete="SET NULL")
     */
    private $faction;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $role;

    /**
     * @var float
     *
     * @ORM\Column(type="float", nullable=true)
     */
    private $power;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255, unique=true)
     */
    private $pseudo;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="broken_blocks")
     */
    private $brokenBlocks;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="placed_blocks")
     */
    private $placedBlocks;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="stupid_deaths")
     */
    private $stupidDeaths;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="pvp_deaths")
     */
    private $pvpDeaths;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $kills;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="played_time")
     */
    private $playedTime;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $verbosity;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $prestige;

    public function __toString()
    {
        return $this->getPseudo();
    }

    /**
     * Get the played time formatted in a string
     *
     * @return string 
     */
    public function getFormattedPlayedTime()
    {
        $timeinSeconds = $this->getPlayedTime();
        $days = $timeinSeconds / 86400;
        $hours = $timeinSeconds % 86400 / 3600;
        $minutes = $timeinSeconds % 3600 / 60;
        $seconds = $timeinSeconds % 60;
        
        return sprintf("%d day(s), %d hour(s), %d minute(s) and %d second(s)",
            $days, $hours, $minutes, $seconds
        );
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
     * Set pseudo
     *
     * @param string $pseudo
     * @return Player
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    
        return $this;
    }

    /**
     * Get pseudo
     *
     * @return string 
     */
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * Set brokenBlocks
     *
     * @param integer $brokenBlocks
     * @return Player
     */
    public function setBrokenBlocks($brokenBlocks)
    {
        $this->brokenBlocks = $brokenBlocks;
    
        return $this;
    }

    /**
     * Get brokenBlocks
     *
     * @return integer 
     */
    public function getBrokenBlocks()
    {
        return $this->brokenBlocks;
    }

    /**
     * Set placedBlocks
     *
     * @param integer $placedBlocks
     * @return Player
     */
    public function setPlacedBlocks($placedBlocks)
    {
        $this->placedBlocks = $placedBlocks;
    
        return $this;
    }

    /**
     * Get placedBlocks
     *
     * @return integer 
     */
    public function getPlacedBlocks()
    {
        return $this->placedBlocks;
    }

    /**
     * Set stupidDeaths
     *
     * @param integer $stupidDeaths
     * @return Player
     */
    public function setStupidDeaths($stupidDeaths)
    {
        $this->stupidDeaths = $stupidDeaths;
    
        return $this;
    }

    /**
     * Get stupidDeaths
     *
     * @return integer 
     */
    public function getStupidDeaths()
    {
        return $this->stupidDeaths;
    }

    /**
     * Set pvpDeaths
     *
     * @param integer $pvpDeaths
     * @return Player
     */
    public function setPvpDeaths($pvpDeaths)
    {
        $this->pvpDeaths = $pvpDeaths;
    
        return $this;
    }

    /**
     * Get pvpDeaths
     *
     * @return integer 
     */
    public function getPvpDeaths()
    {
        return $this->pvpDeaths;
    }

    /**
     * Set kills
     *
     * @param integer $kills
     * @return Player
     */
    public function setKills($kills)
    {
        $this->kills = $kills;
    
        return $this;
    }

    /**
     * Get kills
     *
     * @return integer 
     */
    public function getKills()
    {
        return $this->kills;
    }

    /**
     * Set playedTime
     *
     * @param integer $playedTime
     * @return Player
     */
    public function setPlayedTime($playedTime)
    {
        $this->playedTime = $playedTime;
    
        return $this;
    }

    /**
     * Get playedTime
     *
     * @return integer 
     */
    public function getPlayedTime()
    {
        return $this->playedTime;
    }
    
    /**
     * Set verbosity
     *
     * @param integer $verbosity
     * @return Player
     */
    public function setVerbosity($verbosity)
    {
        $this->verbosity = $verbosity;
    
        return $this;
    }

    /**
     * Get verbosity
     *
     * @return integer 
     */
    public function getVerbosity()
    {
        return $this->verbosity;
    }

    /**
     * Set prestige
     *
     * @param integer $prestige
     * @return Player
     */
    public function setPrestige($prestige)
    {
        $this->prestige = $prestige;
    
        return $this;
    }

    /**
     * Get prestige
     *
     * @return integer 
     */
    public function getPrestige()
    {
        return $this->prestige;
    }

    /**
     * Set faction
     *
     * @param \Ovski\MineStatsBundle\Entity\Faction $faction
     * @return Player
     */
    public function setFaction(\Ovski\MineStatsBundle\Entity\Faction $faction = null)
    {
        $this->faction = $faction;
    
        return $this;
    }

    /**
     * Get faction
     *
     * @return \Ovski\MineStatsBundle\Entity\Faction 
     */
    public function getFaction()
    {
        return $this->faction;
    }

    /**
     * Set role
     *
     * @param string $role
     * @return Player
     */
    public function setRole($role)
    {
        $this->role = $role;
    
        return $this;
    }

    /**
     * Get role
     *
     * @return string 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set power
     *
     * @param float $power
     * @return Player
     */
    public function setPower($power)
    {
        $this->power = $power;
    
        return $this;
    }

    /**
     * Get power
     *
     * @return float 
     */
    public function getPower()
    {
        return $this->power;
    }
}