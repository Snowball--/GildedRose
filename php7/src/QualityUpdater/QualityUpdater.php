<?php
/**
 * @author Snowball <snow-snowball@yandex.ru>
 */

namespace App\QualityUpdater;
use App\Item;

/**
 * Class QualityUpdater
 * @package App\QualityUpdater
 */
class QualityUpdater
{
    /**
     * Метод запускает необходимый обработчик для переданного объекта
     * @param Item $item
     */
    public static function update(Item $item)
    {
        $updater = ItemKeeperFactory::get($item->name);
        $updater->keepOneDay($item);
    }
}