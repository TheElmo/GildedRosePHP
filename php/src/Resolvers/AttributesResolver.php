<?php

declare(strict_types=1);

namespace GildedRose\Resolvers;

use GildedRose\Item;

interface AttributesResolver
{
    public function resolveNewAttributes(Item $item): void;
}
