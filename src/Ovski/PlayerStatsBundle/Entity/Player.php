<?php

namespace Ovski\PlayerStatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Player
 *
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="Ovski\PlayerStatsBundle\Repository\PlayerRepository")
 */
class Player
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="player_id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $player_id;

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

    /**
     * Set brokenBlocks
     *
     * @param integer $brokenBlocks
     * @return Stats
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
     * @return Stats
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
     * @return Stats
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
     * @return Stats
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
     * @return Stats
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
     * @return Stats
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
     * @return Stats
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
     * Set player
     *
     * @param \Ovski\PlayerStatsBundle\Entity\Player $player
     * @return Stats
     */
    public function setPlayer(\Ovski\PlayerStatsBundle\Entity\Player $player)
    {
        $this->player = $player;
    
        return $this;
    }

    /**
     * Get player
     *
     * @return \Ovski\PlayerStatsBundle\Entity\Player 
     */
    public function getPlayer()
    {
        return $this->player;
    }

    /**
     * Set prestige
     *
     * @param integer $prestige
     * @return Stats
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
     * Set player_id
     *
     * @param integer $playerId
     * @return Player
     */
    public function setPlayerId($playerId)
    {
        $this->player_id = $playerId;
    
        return $this;
    }

    /**
     * Get player_id
     *
     * @return integer 
     */
    public function getPlayerId()
    {
        return $this->player_id;
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

}