<?php

namespace App\Model\Traits;

use Illuminate\Support\Collection;

trait IconTrait {

    public function getIconAssetAttribute()
    {
        return self::$dir.'/'.$this->icon;
    }

//    public static function getIconAsset($icon = NULL)
//    {
//        return self::$dir.'/'.$icon;
//    }

    public static function getIconDir()
    {
        return scandir(public_path() . self::$dir);
    }

    public static function getIcons()
    {
        $icons = (new Collection(self::getIconDir()))->filter(function($item) {
            return !in_array($item, ['.','..']);
        });

        return $icons->toArray();
    }

}