<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;

class SulfurasTest extends \PHPUnit\Framework\TestCase
{
    public function testSulfurasDoesNotDecreaseSellIn()
    {
        $sulfuras = new Item('Sulfuras, Hand of Ragnaros', 10, 10);

        $inn = new GildedRose([$sulfuras]);
        $inn->updateQuality();
        $this->assertEquals(10, $sulfuras->sellIn);
    }

    public function testSulfurasDoesNotDecreaseInQuality()
    {
        $sulfuras = new Item('Sulfuras, Hand of Ragnaros', 10, 10);

        $inn = new GildedRose([$sulfuras]);
        $inn->updateQuality();
        $this->assertEquals(10, $sulfuras->quality);
    }
}
