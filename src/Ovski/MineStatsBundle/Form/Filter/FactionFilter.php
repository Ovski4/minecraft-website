<?php

namespace Ovski\MineStatsBundle\Form\Filter;

use IDCI\Bundle\FilterFormBundle\Form\Filter\SelectRelationFieldEntityAbstractFilter;

class FactionFilter extends SelectRelationFieldEntityAbstractFilter
{
    public function getEntityClassName() { return "OvskiMineStatsBundle:Faction"; }

    public function getEntityFieldName() { return "faction"; }

    public function getFilterFormLabel() { return "Faction"; }

    public function getFilterName() { return "player_faction"; }
}