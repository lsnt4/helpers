<?php

namespace Buddhika\Helpers;

class Helpers
{
    public static function getRandomElement(array $array): mixed
    {
        return $array[array_rand($array)];
    }
}
