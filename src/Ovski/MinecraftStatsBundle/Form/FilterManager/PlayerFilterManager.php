<?php

namespace Ovski\MinecraftStatsBundle\Form\FilterManager;

use IDCI\Bundle\FilterFormBundle\Form\FilterManager\EntityAbstractFilterManager;
use Ovski\MinecraftStatsBundle\Form\Filter\PlayerKillsRangeFilter;
use Ovski\MinecraftStatsBundle\Form\Filter\FactionFilter;

class PlayerFilterManager extends EntityAbstractFilterManager
{
    public function buildFilters($options = array())
    {
        $this
            //->addFilter(new PlayerKillsRangeFilter())
            ->addFilter(new FactionFilter())
        ;
    }

    public function getEntityClassName()
    {
        return "Ovski\MinecraftStatsBundle\Entity\Player";
    }
}