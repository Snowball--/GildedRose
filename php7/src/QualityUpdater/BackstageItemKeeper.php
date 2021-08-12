<?php
/**
 * @author Snowball <snow-snowball@yandex.ru>
 */

namespace App\QualityUpdater;

/**
 * Class BackstageItemKeeper
 * @package App\QualityUpdater
 */
class BackstageItemKeeper extends BaseItemKeeper
{
    /**
     * Метод подсчета качества объекта
     * @param int $sellIn
     * @param int $quality
     * @return int
     */
    public function calcQuality(int $sellIn, int $quality): int
    {
        if ($sellIn > 10) {
            // Стандартное изменение качества при хранении объекта более 10 дней
            $quality += $this->qualityChangeIndex;
        } elseif ($sellIn > 5) {
            // Удвоенное изменение качества при хранении объекта от 10 до 6 дней
            $quality += $this->qualityChangeIndex * 2;
        } elseif ($sellIn > 0) {
            // Утроенное изменение качества при хранении объекта от 5 до 0 дней
            $quality += $this->qualityChangeIndex * 3;
        } else {
            // По истечению срока хранения качество падает до минимально возможного значения
            $quality = $this->minQualityValue;
        }

        return $quality;
    }
}