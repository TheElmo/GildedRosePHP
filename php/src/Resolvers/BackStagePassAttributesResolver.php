<?php

declare(strict_types=1);

namespace GildedRose\Resolvers;

use GildedRose\Item;

class BackStagePassAttributesResolver implements AttributesResolver
{
    public function resolveNewAttributes(Item $item): void
    {
        $item->sellIn--;

        if ($item->sellIn >= 10) {
            $item->quality = $item->quality >= 50 ? 50 : $item->quality+1;
            return;
        }
        if ($item->sellIn > 0 && $item->sellIn <= 5) {
            $item->quality = $item->quality >= 48 ? 50 : $item->quality+3;
            return;
        }
        if ($item->sellIn > 0) {
            $item->quality = $item->quality >= 49 ? 50 : $item->quality+2;
            return;
        }
        $item->quality = 0;
    }
}
