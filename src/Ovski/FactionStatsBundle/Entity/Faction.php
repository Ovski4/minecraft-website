<?php

namespace Ovski\FactionStatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Faction
 *
 * @ORM\Table(name="faction")
 * @ORM\Entity(repositoryClass="Ovski\FactionStatsBundle\Repository\FactionRepository")
 */
class Player
{
    /**
     * @var integer
     *
     * @ORM\Column(type="integer", name="faction_id")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $name;
    
    /**
     * @var string
     *
     * @ORM\Column(type="string", length=255)
     */
    private $description;


}