<?php
/**
 * @author Snowball <snow-snowball@yandex.ru>
 */

namespace App\QualityUpdater;


class ConjuredItemKeeper extends BaseItemKeeper
{
    /**
     * Объекты типа "Conjured" имеют увеличенный индекс изменения quality
     * @var int
     */
    protected int $qualityChangeIndex = 2;
}