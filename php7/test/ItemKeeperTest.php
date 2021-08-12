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
     * @param int $sellIn
     * @param int $quality
     * @param int $expectedSellIn
     * @param int $expectedQuality
     */
    public function testLegendaryItemKeeper(int $sellIn, int $quality, int $expectedSellIn, int $expectedQuality)
    {
        $item = new Item('Sulfuras, Hand of Ragnaros', $sellIn, $quality);
        $keeper = ItemKeeperFactory::get($item->name);
        $keeper->keepOneDay($item);
        $this->assertEquals($expectedSellIn, $item->sell_in);
        $this->assertEquals($expectedQuality, $item->quality);
    }


    /**
     * @dataProvider agedDataProvider
     * @param int $sellIn
     * @param int $quality
     * @param int $expectedSellIn
     * @param int $expectedQuality
     */
    public function testAgedItemKeeper(int $sellIn, int $quality, int $expectedSellIn, int $expectedQuality)
    {
        $item = new Item('Aged Brie', $sellIn, $quality);
        $keeper = ItemKeeperFactory::get($item->name);

        $keeper->keepOneDay($item);
        $this->assertEquals($expectedSellIn, $item->sell_in);
        $this->assertEquals($expectedQuality, $item->quality);
    }

    /**
     * @dataProvider baseDataProvider
     * @param int $sellIn
     * @param int $quality
     * @param int $expectedSellIn
     * @param int $expectedQuality
     */
    public function testBaseItemKeeper(int $sellIn, int $quality, int $expectedSellIn, int $expectedQuality)
    {
        $item = new Item('+5 Dexterity Vest', $sellIn, $quality);
        $keeper = ItemKeeperFactory::get($item->name);

        $keeper->keepOneDay($item);
        $this->assertEquals($expectedSellIn, $item->sell_in);
        $this->assertEquals($expectedQuality, $item->quality);
    }

    /**
     * @dataProvider backstageDataProvider
     * @param int $sellIn
     * @param int $quality
     * @param int $expectedSellIn
     * @param int $expectedQuality
     */
    public function testBackstageItemKeeper(int $sellIn, int $quality, int $expectedSellIn, int $expectedQuality)
    {
        $item = new Item('Backstage passes to a TAFKAL80ETC concert', $sellIn, $quality);
        $keeper = ItemKeeperFactory::get($item->name);

        $keeper->keepOneDay($item);
        $this->assertEquals($expectedSellIn, $item->sell_in);
        $this->assertEquals($expectedQuality, $item->quality);
    }

    /**
     * @dataProvider conjuredDataProvider
     * @param int $sellIn
     * @param int $quality
     * @param int $expectedSellIn
     * @param int $expectedQuality
     */
    public function testConjuredItemKeeper(int $sellIn, int $quality, int $expectedSellIn, int $expectedQuality)
    {
        $item = new Item('Conjured Mana Cake', $sellIn, $quality);
        $keeper = ItemKeeperFactory::get($item->name);

        $keeper->keepOneDay($item);
        $this->assertEquals($expectedSellIn, $item->sell_in);
        $this->assertEquals($expectedQuality, $item->quality);
    }

    /**
     * @return \int[][]
     */
    public function legendaryDataProvider(): array
    {
        return [
            [99, 80, 99, 80],
            [0, 80, 0, 80],
            [0, 5, 0, 80],
        ];
    }

    /**
     * @return \int[][]
     */
    public function agedDataProvider(): array
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

    /**
     * @return \int[][]
     */
    public function baseDataProvider(): array
    {
        return [
            [9, 19, 8, 18],
            [8, 18, 7, 17],
            [1, 18, 0, 17],
            [0, 18, -1, 16],
            [-5, -2, -6, 0],
        ];
    }

    /**
     * @return \int[][]
     */
    public function backstageDataProvider(): array
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

    /**
     * @return \int[][]
     */
    public function conjuredDataProvider(): array
    {
        return [
            [15, 0, 14, 0],
            [10, 15, 9, 13],
            [5, -3, 4, 0],
            [-2, 6, -3, 2],
        ];
    }


}