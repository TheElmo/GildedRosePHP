<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;

class BackStagePasTest extends \PHPUnit\Framework\TestCase
{
    public function testBackStagePassIncreasesQualityWithOneWhenPositiveSellInGreaterThenTen()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 11, 10);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(11, $item->quality);
    }
    public function testBackStagePassIncreasesQualityWithTwoWhenPositiveSellInLesserOrEqualThenTen()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 10, 10);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(12, $item->quality);
    }

    public function testBackStagePassIncreasesQualityWithThreeWhenPositiveSellInLesserOrEqualThenFive()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 5, 10);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(13, $item->quality);
    }

    public function testBackStagPassQualitySetsToZeroWhenGoesToNegativeSellIn()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 0, 10);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(0, $item->quality);
    }

    public function testQualityCannotBeLowerThenZero()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', -10, 0);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(0, $item->quality);
    }

    public function testQualityCannotBeHigherThenFifty()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 9, 50);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(50, $item->quality);
    }

    public function testQualityCannotBeHigherThenFiftyWhenSellInIsFive()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 5, 50);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(50, $item->quality);
    }

    public function testQualityCannotBeHigherThenFiftyWhenSellInIsLessThenFive()
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', 3, 50);

        $inn = new GildedRose([$item]);
        $inn->updateQuality();
        $this->assertEquals(50, $item->quality);
    }
}
