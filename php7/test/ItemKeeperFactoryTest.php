<?php
/**
 * @author Snowball <snow-snowball@yandex.ru>
 */

namespace App;

use App\QualityUpdater\ItemKeeperFactory;
use App\QualityUpdater\AgedItemKeeper;
use App\QualityUpdater\BackstageItemKeeper;
use App\QualityUpdater\BaseItemKeeper;
use App\QualityUpdater\ConjuredItemKeeper;
use App\QualityUpdater\LegendaryItemKeeper;
use PHPUnit\Framework\TestCase;

/**
 * Class ItemKeeperFactoryTest
 * @author snowball <snow-snowball@yandex.ru>
 * @package App
 */
class ItemKeeperFactoryTest extends TestCase
{
    /**
     * @dataProvider provider
     */
    public function testKeeperFactory(Item $item, $keeperClass)
    {
        $keeper = ItemKeeperFactory::get($item->name);
        $this->assertInstanceOf($keeperClass, $keeper);
    }

    /**
     * @return array[]
     */
    public function provider(): array
    {
        return [
            'base' => [new Item('+5 Dexterity Vest', 10, 20), BaseItemKeeper::class],
            'aged' => [new Item('Aged Brie', 2, 0), AgedItemKeeper::class],
            'legendary' => [new Item('Sulfuras, Hand of Ragnaros', 0, 80), LegendaryItemKeeper::class],
            'backstage' => [new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49), BackstageItemKeeper::class],
            'conjured' => [new Item('Conjured Mana Cake', 3, 15), ConjuredItemKeeper::class]
        ];
    }
}