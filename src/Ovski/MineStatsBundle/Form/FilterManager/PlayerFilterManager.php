<?php

namespace Ovski\MineStatsBundle\Form\FilterManager;

use IDCI\Bundle\FilterFormBundle\Form\FilterManager\EntityAbstractFilterManager;
use Ovski\MineStatsBundle\Form\Filter\PlayerKillsRangeFilter;
use Ovski\MineStatsBundle\Form\Filter\FactionFilter;

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
        return "Ovski\MineStatsBundle\Entity\Player";
    }
}