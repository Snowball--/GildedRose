<?php

namespace App\QualityUpdater;
use App\Item;

interface iItemKeeper
{
    public function keepOneDay(Item $item): Item;
}