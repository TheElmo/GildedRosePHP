<?php

declare(strict_types=1);

namespace GildedRose\Resolvers;

use GildedRose\Item;

class BackStagePassAttributesResolver implements AttributesResolver
{
    public function resolveNewAttributes(Item $item): Item
    {

        if ($item->sellIn > 10) {
            $item->quality = $item->quality >= 50 ? 50 : $item->quality+1;
        } else if ($item->sellIn > 0 && $item->sellIn <= 5) {
            $item->quality = $item->quality >= 50 ? 50 : $item->quality+3;
        } else if ($item->sellIn > 0) {
            $item->quality = $item->quality >= 50 ? 50 : $item->quality+2;
        }  else {
            $item->quality = 0;
        }

        $item->sellIn--;
        return $item;
    }
}
