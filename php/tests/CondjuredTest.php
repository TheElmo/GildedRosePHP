<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;

class CondjuredTest extends \PHPUnit\Framework\TestCase
{
    public function testSellInDecreasesWithTwoWhenPositiveSellIn()
    {
        $item = new Item('Conjured Mana Cake', 10, 0);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertGreaterThanOrEqual(8, $item->sellIn);
    }

    public function testQualityDecreasesWithFourWithNegativeSellIn()
    {
        $item = new Item('Conjured Mana Cake', 0, 10);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(6, $item->quality);
    }

    public function testQualityCannotBeNegative()
    {
        $item = new Item('Conjured Mana Cake', 0, 0);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(0, $item->quality);
    }
}
