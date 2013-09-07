<?php

namespace Ovski\MinecraftUserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class OvskiMinecraftUserBundle extends Bundle
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
