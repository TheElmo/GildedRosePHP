<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class NormalItem extends TestCase
{
    public function testQualityCannotBeNegative()
    {
        $item = new Item('Beer', 0, 0);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertGreaterThanOrEqual(0, $item->quality);
    }

    public function testQualityDecreasesWithOneWithPositiveSellIn()
    {
        $item = new Item('Beer', 10, 50);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(49, $item->quality);
    }

    public function testQualityDecreasesWithTwoWithNegativeSellIn()
    {
        $item = new Item('Beer', 0, 50);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(48, $item->quality);
    }
}
