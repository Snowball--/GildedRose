<?php

namespace App;

use App\QualityUpdater\QualityUpdater;

/**
 * Class GildedRose
 * @package App
 */
final class GildedRose {

    private $items = [];

    public function __construct($items) {
        $this->items = $items;
    }

    public function updateQuality() {
        foreach ($this->items as $item) {
            // Let's update items
            QualityUpdater::update($item);
        }
    }
}

