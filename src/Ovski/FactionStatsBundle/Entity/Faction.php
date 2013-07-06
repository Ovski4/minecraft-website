<?php

namespace Ovski\FactionStatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faction
 *
 * @ORM\Table(name="player")
 * @ORM\Entity(repositoryClass="Ovski\FactionStatsBundle\Repository\PlayerRepository")
 */
class Faction
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="player_id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
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


}