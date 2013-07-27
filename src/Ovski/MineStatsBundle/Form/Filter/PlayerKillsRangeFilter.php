<?php

namespace Ovski\MineStatsBundle\Form\Filter;

use IDCI\Bundle\FilterFormBundle\Form\Filter\RangeFieldEntityAbstractFilter;

class PlayerKillsRangeFilter extends RangeFieldEntityAbstractFilter
{
    public function getEntityClassName() { return "OvskiMineStatsBundle:Player"; }

    public function getFilterFormLabel() { return "Kills"; }

    public function getFilterName() { return "player_kills"; }

    public function getEntityFieldName() { return "kills"; }

    public function getEntityFieldValueMax() {}

    public function getEntityFieldValueMin() {}
}