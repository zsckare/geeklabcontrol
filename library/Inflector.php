<?php
if (defined('YOi_Start') && $YOi_Token == "5ab7b44c0747390658bbf882ae4df1c7") {
    class Inflector {

        public static function swap($value)
        {
            $segments = explode('-', $value);

            array_walk($segments, function (&$item) {
                $item = ucfirst($item);
            });

            return implode('', $segments);
        }

        public static function lowerSwap($value)
        {
            return lcfirst(static::swap($value));
        }

    }
}