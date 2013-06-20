<?php

namespace Ovski\StatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Kill
 *
 * @ORM\Table(name="kill")
 * @ORM\Entity(repositoryClass="Ovski\StatsBundle\Repository\KillRepository")
 */
class Kill
{
    /**
     * @var integer
     *
     * @ORM\Column(name="kill_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="weapon_id")
     */
    private $weapon;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\StatsBundle\Entity\Player")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="player_id", name="killed_player_id")
     */
    private $killedPlayer;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\StatsBundle\Entity\Player")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="player_id", name="killer_player_id")
     */
    private $killerPlayer;

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
     * Set weapon
     *
     * @param integer $weapon
     * @return Kill
     */
    public function setWeapon($weapon)
    {
        $this->weapon = $weapon;
    
        return $this;
    }

    /**
     * Get weapon
     *
     * @return integer 
     */
    public function getWeapon()
    {
        return $this->weapon;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Kill
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set killedPlayer
     *
     * @param \Ovski\StatsBundle\Entity\Player $killedPlayer
     * @return Kill
     */
    public function setKilledPlayer(\Ovski\StatsBundle\Entity\Player $killedPlayer)
    {
        $this->killedPlayer = $killedPlayer;
    
        return $this;
    }

    /**
     * Get killedPlayer
     *
     * @return \Ovski\StatsBundle\Entity\Player 
     */
    public function getKilledPlayer()
    {
        return $this->killedPlayer;
    }

    /**
     * Set killerPlayer
     *
     * @param \Ovski\StatsBundle\Entity\Player $killerPlayer
     * @return Kill
     */
    public function setKillerPlayer(\Ovski\StatsBundle\Entity\Player $killerPlayer)
    {
        $this->killerPlayer = $killerPlayer;
    
        return $this;
    }

    /**
     * Get killerPlayer
     *
     * @return \Ovski\StatsBundle\Entity\Player 
     */
    public function getKillerPlayer()
    {
        return $this->killerPlayer;
    }
}
