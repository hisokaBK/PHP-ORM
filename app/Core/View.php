<?php

namespace App\Core;

use eftec\bladeone\BladeOne;

class View
{
    private static ?BladeOne $blade = null;

    public static function blade(): BladeOne
    {
        if (static::$blade === null) {
            $views = dirname(__DIR__, 2) . '/resources/Views';
            $cache = dirname(__DIR__, 2) . '/cache';

            static::$blade = new BladeOne(
                $views,
                $cache,
                BladeOne::MODE_AUTO
            );
        }

        return static::$blade;
    }

    public static function render(string $view, array $data = [])
    {
        echo static::blade()->run($view, $data);
    }
}
