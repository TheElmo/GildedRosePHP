<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;

class AgedBrieTest extends \PHPUnit\Framework\TestCase
{
    public function testAgedBrieIncreasedWithTwoPastSellIn()
    {
        $agedBrie = new Item('Aged Brie', -10, 10);

        $inn = new GildedRose([$agedBrie]);
        $inn->updateQuality();
        $this->assertEquals(12, $agedBrie->quality);
    }

    public function testAgedBrieIncreasedWithOneBeforeSellIn()
    {
        $agedBrie = new Item('Aged Brie', 10, 10);

        $inn = new GildedRose([$agedBrie]);
        $inn->updateQuality();
        $this->assertEquals(11, $agedBrie->quality);
    }

    public function testAgedBrieQualityCannotBeGreaterThenFifty()
    {
        $agedBrie = new Item('Aged Brie', 10, 50);

        $inn = new GildedRose([$agedBrie]);
        $inn->updateQuality();
        $this->assertEquals(50, $agedBrie->quality);
    }
}
