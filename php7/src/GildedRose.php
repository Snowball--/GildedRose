<?php

namespace App;

use App\QualityUpdater\QualityUpdater;

/**
 * Class GildedRose
 * @package App
 */
final class GildedRose {

    /**
     * @var array
     */
    private array $items = [];

    /**
     * GildedRose constructor.
     * @param array $items
     */
    public function __construct(array $items) {
        $this->items = $items;
    }

    public function updateQuality() {
        foreach ($this->items as $item) {
            // Let's update items
            QualityUpdater::update($item);
        }
    }
}

