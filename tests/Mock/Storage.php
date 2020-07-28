<?php
declare(strict_types=1);

namespace Tests\Mock;

use eugenebunin\Throttle\Storage\Storage as StorageInterface;
use Exception;

/**
 * Class Storage
 */
class Storage implements StorageInterface
{

    public static $cache = [];

    public function set(string $key, string $value): void
    {
        static::$cache[$key] = $value;
    }

    public function get(string $key): ?string
    {
        if ($this->has($key)) {
            return static::$cache[$key];
        }
        return null;
    }

    public function has(string $key): bool
    {
        return isset(static::$cache[$key]);
    }

    /**
     * @param int $ttl
     * @throws Exception
     */
    public function setTtl(int $ttl): void
    {
        throw new Exception('not implemented');
    }

    /**
     * @param string $prefix
     * @throws Exception
     */
    public function setPrefix(string $prefix): void
    {
        throw new Exception('not implemented');
    }
}
