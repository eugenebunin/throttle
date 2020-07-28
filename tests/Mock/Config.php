<?php
declare(strict_types=1);

namespace Tests\Mock;

use eugenebunin\Throttle\Config as ConfigInterface;

class Config implements ConfigInterface
{
    public static $ttl = 3360;

    public static $attempts = 2;

    public static $prefix = 'throttle';

    public function ttl(): int
    {
        return static::$ttl;
    }

    public function attempts(): int
    {
        return static::$attempts;
    }

    public function prefix(): string
    {
        return static::$prefix;
    }
}
