<?php
/**
 * @author Snowball <snow-snowball@yandex.ru>
 */

namespace App\QualityUpdater;
use App\Item;

/**
 * Class LegendaryItemKeeper
 * @package App\QualityUpdater
 */
class LegendaryItemKeeper implements iItemKeeper
{
    /**
     * Значение качества легендарых вещей
     * @var int
     */
    protected int $qualityValue = 80;

    /**
     * Легендарный объект имеет повышенное значение качества и не портится со временем
     * @param Item $item
     * @return Item
     */
    public function keepOneDay(Item $item): Item
    {
        // Если качество не соответствет указанному для данного типа вещей, выставляем значение качества в соответствии с данными в задаче
        if ($item->quality != $this->qualityValue) {
            $item->quality = $this->qualityValue;
        }
        return  $item;
    }
}