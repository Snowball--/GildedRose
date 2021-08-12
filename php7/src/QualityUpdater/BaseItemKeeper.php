<?php
/**
 * @author Snowball <snow-snowball@yandex.ru>
 */

namespace App\QualityUpdater;

use App\Item;

class BaseItemKeeper implements iItemKeeper
{
    /**
     * Максимально возможное значение параметра quality
     * @var int
     */
    protected $maxQualityValue = 50;

    /**
     * Минимально возможное значение параметра quality
     * @var int
     */
    protected $minQualityValue = 0;

    /**
     * Индекс изменения параметра quality
     * @var int
     */
    protected $qualityChangeIndex = 1;

    /**
     * Метод изменения данных в объекте
     * @param Item $item
     * @return Item
     */
    public function keepOneDay(Item $item): Item
    {
        $this->updateQuality($item);
        $this->updateSellIn($item);

        return $item;
    }

    /**
     * Изменение sell_in объекта
     * @param Item $item
     */
    protected function updateSellIn(Item $item)
    {
        $item->sell_in -= 1;
    }

    /**
     * Изменение quality объекта
     * @param Item $item
     */
    protected function updateQuality(Item $item)
    {
        $quality = $this->calcQuality($item->sell_in, $item->quality);

        $quality = $quality > $this->maxQualityValue ? $this->maxQualityValue : $quality;
        $quality = $quality < $this->minQualityValue ? $this->minQualityValue : $quality;
        $item->quality = $quality;
    }

    /**
     * Подсчет quality в соотвествии с sell_in
     * @param int $sellIn
     * @param int $quality
     * @return int
     */
    protected function calcQuality(int $sellIn, int $quality): int
    {
        if ($sellIn <= 0) {
            $quality -= $this->qualityChangeIndex * 2;
        } else {
            $quality -= $this->qualityChangeIndex;
        }
        return $quality;
    }
}