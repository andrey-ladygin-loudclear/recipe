<?php

namespace App\Models\Values;

use Illuminate\Support\Collection;

class Icon {

    private $dir;
    private $icon;

    public function __construct($icon, $dir)
    {
        $this->dir = $dir;
        $this->icon = $icon;
    }

    public function __toString()
    {
        return $this->icon;
    }

    public function asset()
    {
        return $this->dir.'/'.$this->icon;
    }

    public function getIconDir()
    {
        return scandir(public_path() . $this->dir);
    }

    public function getIcons()
    {
        $icons = (new Collection(self::getIconDir()))->filter(function($item) {
            return !in_array($item, ['.','..']);
        });

        return $icons->toArray();
    }
}