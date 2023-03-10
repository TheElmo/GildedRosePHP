<?php

declare(strict_types=1);

namespace GildedRose\Resolvers;

use GildedRose\Item;

class AgedBrieAttributesResolver implements AttributesResolver
{

    public function resolveNewAttributes(Item $item): Item
    {
        $item->sellIn--;

        if ($item->quality >= 50) {
            $item->quality = 50;
            return $item;
        }

        if ($item->sellIn < 0) {
            $item->quality += 2;
            return $item;
        }

        $item->quality++;
        return $item;
    }
}
