<?php

declare(strict_types=1);

namespace GildedRose\Resolvers;

use GildedRose\Item;

class SulfurasAttributesResolver implements AttributesResolver
{
    public function resolveNewAttributes(Item $item): Item
    {
        return $item;
    }
}
