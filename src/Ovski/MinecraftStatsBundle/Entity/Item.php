<?php

namespace Ovski\MinecraftStatsBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Item
 *
 * @ORM\Table(name="minecraft_item")
 * @ORM\Entity()
 */
class Item
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string")
     * @ORM\Id
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="kill_ability", type="integer")
     */
    private $killAbility;

    /**
     * Set id
     *
     * @param string $id
     * @return Item
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
     * Set killAbility
     *
     * @param integer $killAbility
     * @return Item
     */
    public function setKillAbility($killAbility)
    {
        $this->killAbility = $killAbility;
    
        return $this;
    }

    /**
     * Get killAbility
     *
     * @return integer 
     */
    public function getKillAbility()
    {
        return $this->killAbility;
    }
}