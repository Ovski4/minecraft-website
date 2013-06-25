<?php

namespace Ovski\PlayerStatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Note
 *
 * @UniqueEntity({"receiver_player_id", "donor_player"})
 * @UniqueEntity("receiver_player_id")
 * @UniqueEntity("donor_player_id")
 * @ORM\Table(name="note")
 * @ORM\Entity(repositoryClass="Ovski\PlayerStatsBundle\Repository\NoteRepository")
 */
class Note
{
    /**
     * @var integer
     *
     * @ORM\Column(name="note_id", type="integer")
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
     * @ORM\ManyToOne(targetEntity="Ovski\PlayerStatsBundle\Entity\Player")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="player_id", name="receiver_player_id")
     */
    private $receiverPlayer;

    /**
     * @ORM\ManyToOne(targetEntity="Ovski\PlayerStatsBundle\Entity\Player")
     * @ORM\JoinColumn(nullable=false, referencedColumnName="player_id", name="donor_player_id")
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
     * @param \Ovski\PlayerStatsBundle\Entity\Player $receiverPlayer
     * @return Note
     */
    public function setReceiverPlayer(\Ovski\PlayerStatsBundle\Entity\Player $receiverPlayer)
    {
        $this->receiverPlayer = $receiverPlayer;
    
        return $this;
    }

    /**
     * Get receiverPlayer
     *
     * @return \Ovski\PlayerStatsBundle\Entity\Player 
     */
    public function getReceiverPlayer()
    {
        return $this->receiverPlayer;
    }

    /**
     * Set donorPlayer
     *
     * @param \Ovski\PlayerStatsBundle\Entity\Player $donorPlayer
     * @return Note
     */
    public function setDonorPlayer(\Ovski\PlayerStatsBundle\Entity\Player $donorPlayer)
    {
        $this->donorPlayer = $donorPlayer;
    
        return $this;
    }

    /**
     * Get donorPlayer
     *
     * @return \Ovski\PlayerStatsBundle\Entity\Player 
     */
    public function getDonorPlayer()
    {
        return $this->donorPlayer;
    }
}
