<?php

namespace Ovski\MinecraftStatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Kill
 *
 * @ORM\Table(name="minecraft_kill")
 * @ORM\Entity(repositoryClass="Ovski\MinecraftStatsBundle\Repository\KillRepository")
 * @UniqueEntity("killed_player_id")
 * @UniqueEntity("killer_player_id")
 */
class Kill
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
     * @ORM\ManyToOne(targetEntity="Ovski\MinecraftStatsBundle\Entity\Item")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id", name="weapon_id")
     */
    private $weapon;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\MinecraftStatsBundle\Entity\Player")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id", name="killed_player_id")
     */
    private $killedPlayer;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\MinecraftStatsBundle\Entity\Player")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id", name="killer_player_id")
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
     * @param \Ovski\MinecraftStatsBundle\Entity\Item $weapon
     * @return Kill
     */
    public function setWeapon(\Ovski\MinecraftStatsBundle\Entity\Item $weapon)
    {
        $this->weapon = $weapon;
    
        return $this;
    }

    /**
     * Get weapon
     *
     * @return \Ovski\MinecraftStatsBundle\Entity\Item 
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
     * @param \Ovski\MinecraftStatsBundle\Entity\Player $killedPlayer
     * @return Kill
     */
    public function setKilledPlayer(\Ovski\MinecraftStatsBundle\Entity\Player $killedPlayer)
    {
        $this->killedPlayer = $killedPlayer;
    
        return $this;
    }

    /**
     * Get killedPlayer
     *
     * @return \Ovski\MinecraftStatsBundle\Entity\Player 
     */
    public function getKilledPlayer()
    {
        return $this->killedPlayer;
    }

    /**
     * Set killerPlayer
     *
     * @param \Ovski\MinecraftStatsBundle\Entity\Player $killerPlayer
     * @return Kill
     */
    public function setKillerPlayer(\Ovski\MinecraftStatsBundle\Entity\Player $killerPlayer)
    {
        $this->killerPlayer = $killerPlayer;
    
        return $this;
    }

    /**
     * Get killerPlayer
     *
     * @return \Ovski\MinecraftStatsBundle\Entity\Player 
     */
    public function getKillerPlayer()
    {
        return $this->killerPlayer;
    }
}