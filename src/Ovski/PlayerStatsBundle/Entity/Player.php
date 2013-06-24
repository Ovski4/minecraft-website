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
     * @ORM\Column(type="string", length=255)
     */
    private $pseudo;

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