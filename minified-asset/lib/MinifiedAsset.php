<?php 

class MinifiedAsset extends \Laravel\Asset {
    public static function container($container = 'default') {
        if(!isset(static::$containers[$container])) {
            static::$containers[$container] = new MinifiedAsset_Container($container);
        }

        return static::$containers[$container];
    }
}