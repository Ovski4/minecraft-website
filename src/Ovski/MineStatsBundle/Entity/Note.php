<?php

namespace Ovski\MineStatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Note
 *
 * @UniqueEntity("receiver_player_id")
 * @UniqueEntity("donor_player_id")
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="Ovski\MineStatsBundle\Repository\NoteRepository")
 */
class Note
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
     * @var integer
     *
     * @ORM\Column(type="integer")
     */
    private $value;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\MineStatsBundle\Entity\Player")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id", name="receiver_player_id")
     */
    private $receiverPlayer;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\MineStatsBundle\Entity\Player")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="id", name="donor_player_id")
     */
    private $donorPlayer;

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
     * Set value
     *
     * @param integer $value
     * @return Note
     */
    public function setValue($value)
    {
        $this->value = $value;
    
        return $this;
    }

    /**
     * Get value
     *
     * @return integer 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set receiverPlayer
     *
     * @param \Ovski\MineStatsBundle\Entity\Player $receiverPlayer
     * @return Note
     */
    public function setReceiverPlayer(\Ovski\MineStatsBundle\Entity\Player $receiverPlayer)
    {
        $this->receiverPlayer = $receiverPlayer;
    
        return $this;
    }

    /**
     * Get receiverPlayer
     *
     * @return \Ovski\MineStatsBundle\Entity\Player 
     */
    public function getReceiverPlayer()
    {
        return $this->receiverPlayer;
    }

    /**
     * Set donorPlayer
     *
     * @param \Ovski\MineStatsBundle\Entity\Player $donorPlayer
     * @return Note
     */
    public function setDonorPlayer(\Ovski\MineStatsBundle\Entity\Player $donorPlayer)
    {
        $this->donorPlayer = $donorPlayer;
    
        return $this;
    }

    /**
     * Get donorPlayer
     *
     * @return \Ovski\MineStatsBundle\Entity\Player 
     */
    public function getDonorPlayer()
    {
        return $this->donorPlayer;
    }
}
