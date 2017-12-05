<?php

namespace App\Helpers;

use Illuminate\Support\Collection;

abstract class IconHelper {

    const ICONS_DIR = '/assets/img/icons';
    const QUESTION_MARK = '/special/Inv_misc_questionmark.png';

    public static function asset($icon)
    {
        return self::ICONS_DIR . $icon;
    }

    public static function scandir($dir)
    {
        return scandir($dir);
    }

    public static function scandir_recursive($dir = '')
    {
        $images = new Collection();
        $path = public_path() . self::ICONS_DIR;

        foreach(scandir($path . $dir) as $file)
        {
            if(!in_array($file, ['.', '..'])) {
                if(is_dir("{$path}{$dir}/{$file}")) {
                    $images = $images->merge(self::scandir_recursive("{$dir}/{$file}"));
                }
                else
                {
                    $images->push("{$dir}/{$file}");
                }
            }
        }

        return $images;
    }

    public static function getIcons()
    {
        $icons = self::scandir_recursive();

        return $icons->toArray();
    }
}