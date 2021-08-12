<?php
/**
 * @author Snowball <snow-snowball@yandex.ru>
 */

namespace App;


use App\QualityUpdater\ItemKeeperFactory;
use PHPUnit\Framework\TestCase;

class ItemKeeperTest extends TestCase
{
    /**
     * @dataProvider legendaryDataProvider
     * @param $sellIn
     * @param $quality
     * @param $expectedSellIn
     * @param $expectedQuality
     */
    public function testLegendaryItemKeeper($sellIn, $quality, $expectedSellIn, $expectedQuality)
    {
        $item = new Item('Sulfuras, Hand of Ragnaros', $sellIn, $quality);
        $keeper = ItemKeeperFactory::get($item->name);
        $keeper->keepOneDay($item);
        $this->assertEquals($expectedSellIn, $item->sell_in);
        $this->assertEquals($expectedQuality, $item->quality);
    }


    /**
     * @dataProvider agedDataProvider
     * @param $sellIn
     * @param $quality
     * @param $expectedSellIn
     * @param $expectedQuality
     */
    public function testAgedItemKeeper($sellIn, $quality, $expectedSellIn, $expectedQuality)
    {
        $item = new Item('Aged Brie', $sellIn, $quality);
        $keeper = ItemKeeperFactory::get($item->name);

        $keeper->keepOneDay($item);
        $this->assertEquals($expectedSellIn, $item->sell_in);
        $this->assertEquals($expectedQuality, $item->quality);
    }

    /**
     * @dataProvider baseDataProvider
     * @param $sellIn
     * @param $quality
     * @param $expectedSellIn
     * @param $expectedQuality
     */
    public function testBaseItemKeeper($sellIn, $quality, $expectedSellIn, $expectedQuality)
    {
        $item = new Item('+5 Dexterity Vest', $sellIn, $quality);
        $keeper = ItemKeeperFactory::get($item->name);

        $keeper->keepOneDay($item);
        $this->assertEquals($expectedSellIn, $item->sell_in);
        $this->assertEquals($expectedQuality, $item->quality);
    }

    /**
     * @dataProvider backstageDataProvider
     * @param $sellIn
     * @param $quality
     * @param $expectedSellIn
     * @param $expectedQuality
     */
    public function testBackstageItemKeeper($sellIn, $quality, $expectedSellIn, $expectedQuality)
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', $sellIn, $quality);
        $keeper = ItemKeeperFactory::get($item->name);

        $keeper->keepOneDay($item);
        $this->assertEquals($expectedSellIn, $item->sell_in);
        $this->assertEquals($expectedQuality, $item->quality);
    }

    /**
     * @dataProvider conjuredDataProvider
     * @param $sellIn
     * @param $quality
     * @param $expectedSellIn
     * @param $expectedQuality
     */
    public function testConjuredItemKeeper($sellIn, $quality, $expectedSellIn, $expectedQuality)
    {
        $item = new Item('Conjured Mana Cake', $sellIn, $quality);
        $keeper = ItemKeeperFactory::get($item->name);

        $keeper->keepOneDay($item);
        $this->assertEquals($expectedSellIn, $item->sell_in);
        $this->assertEquals($expectedQuality, $item->quality);
    }

    public function legendaryDataProvider()
    {
        return [
            [99, 80, 99, 80],
            [0, 80, 0, 80],
            [0, 5, 0, 80],
        ];
    }

    public function agedDataProvider()
    {
        return [
            [2, 0, 1, 1],
            [1, 1, 0, 2],
            [0, 2, -1, 4],
            [-1, 4, -2, 6],
            [-2, 55, -3, 50],
            [-2, -5, -3, 0],
        ];
    }

    public function baseDataProvider()
    {
        return [
            [9, 19, 8, 18],
            [8, 18, 7, 17],
            [1, 18, 0, 17],
            [0, 18, -1, 16],
            [-5, -2, -6, 0],
        ];
    }

    public function backstageDataProvider()
    {
        return [
            [15, 0, 14, 1],
            [10, 1, 9, 3],
            [5, 3, 4, 6],
            [1, 6, 0, 9],
            [0, 9, -1, 0],
            [3, 48, 2, 50],
        ];
    }

    public function conjuredDataProvider()
    {
        return [
            [15, 0, 14, 0],
            [10, 15, 9, 13],
            [5, -3, 4, 0],
            [-2, 6, -3, 2],
        ];
    }


}