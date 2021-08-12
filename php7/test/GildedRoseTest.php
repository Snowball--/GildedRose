<?php

namespace App;

use PHPUnit\Framework\TestCase;

/**
 * Class GildedRoseTest
 * @author snowball <snow-snowball@yandex.ru>
 * @package App
 */
class GildedRoseTest extends TestCase {
    public function testFoo() {
        $items      = [new Item("foo", 5, 9)];
        $gildedRose = new GildedRose($items);
        $gildedRose->updateQuality();
        $this->assertEquals(4, $items[0]->sell_in);
        $this->assertEquals(8, $items[0]->quality);
    }

}
