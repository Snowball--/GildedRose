<?php
/**
 * @author Snowball <snow-snowball@yandex.ru>
 */

namespace App\QualityUpdater;

/**
 * Class AgedItemKeeper
 * @package App\QualityUpdater
 */
class AgedItemKeeper extends BaseItemKeeper
{
    /**
     * Индекс изменения качества для "Aged" вещей
     * @var int
     */
    protected int $qualityChangeIndex = -1;
}