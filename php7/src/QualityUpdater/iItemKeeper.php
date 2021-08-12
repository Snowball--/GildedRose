<?php

namespace App\QualityUpdater;
use App\Item;

/**
 * Interface iItemKeeper
 * @package App\QualityUpdater
 */
interface iItemKeeper
{
    /**
     * @param Item $item
     * @return Item
     */
    public function keepOneDay(Item $item): Item;
}