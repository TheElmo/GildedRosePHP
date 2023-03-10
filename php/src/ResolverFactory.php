<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Resolvers\AgedBrieAttributesResolver;
use GildedRose\Resolvers\BackStagePassAttributesResolver;
use GildedRose\Resolvers\ConjuredAttributesResolver;
use GildedRose\Resolvers\NormalItemAttributesResolver;
use GildedRose\Resolvers\AttributesResolver;
use GildedRose\Resolvers\SulfurasAttributesResolver;

class ResolverFactory
{
    public function createQualityResolverForItem(Item $item): AttributesResolver {
        if ($this->isItemAgedBrie($item)) {
            return new AgedBrieAttributesResolver();
        }
        if ($this->isItemBackstagePass($item)) {
            return new BackStagePassAttributesResolver();
        }
        if ($this->isItemSulfuras($item)) {
            return new SulfurasAttributesResolver();
        }
        if ($this->isItemConjured($item)) {
            return new ConjuredAttributesResolver();
        }

        return new NormalItemAttributesResolver();
    }

    private function isItemAgedBrie(Item $item): bool
    {
        return $item->name === 'Aged Brie';
    }

    private function isItemBackstagePass(Item $item): bool
    {
        return $item->name === 'Backstage passes to a TAFKAL80ETC concert';
    }

    private function isItemSulfuras(Item $item): bool
    {
        return $item->name === 'Sulfuras, Hand of Ragnaros';
    }

    private function isItemConjured(Item $item): bool
    {
        return $item->name === 'Conjured Mana Cake';
    }
}
