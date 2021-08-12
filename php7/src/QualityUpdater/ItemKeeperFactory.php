<?php
/**
 * @author Snowball <snow-snowball@yandex.ru>
 */

namespace App\QualityUpdater;

/**
 * Class ItemKeeperFactory
 * @package App\QualityUpdater
 */
class ItemKeeperFactory
{
    /**
     * @var array
     */
    protected static array $itemKeepers = [];

    /**
     * ItemKeeperFactory constructor.
     */
    private function __construct() {}

    /**
     * Возвращает необходимый обработчик исходя из имени объекта
     * @param string $itemName
     * @return iItemKeeper
     */
    public static function get(string $itemName): iItemKeeper
    {
        // Определяем тип
        switch ($itemName) {
            case 'Aged Brie':
                $type = 'aged';
                break;
            case 'Sulfuras, Hand of Ragnaros':
                $type = 'legendary';
                break;
            case 'Backstage passes to a TAFKAL80ETC concert':
                $type = 'backstage';
                break;
            case 'Conjured Mana Cake':
                $type = 'conjured';
                break;
            default:
                $type = 'base';
        }

        // В случае отсутствия нужного обработчика создаем новый объект, иначе используем существующий
        if (empty(self::$itemKeepers[$type])) {
            $qualityUpdater = 'App\\QualityUpdater\\' . ucfirst($type) . 'ItemKeeper';
            self::$itemKeepers[$type] = new $qualityUpdater();
        }

        return self::$itemKeepers[$type];
    }
}