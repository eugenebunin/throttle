<?php

declare(strict_types=1);

namespace Flexbe\Throttle\Storage;

use Memcached;

/**
 * Class Memcached
 * @package Flexbe\Throttle\Storage
 */
class MemcachedStorage implements Storage
{
    const DEFAULT_TTL = 3600;
    const DEFAULT_PREFIX = 'Throttle::';

    /**
     * @var Memcached
     */
    private $memcached;

    /**
     * In Seconds
     * @var int
     */
    private $ttl;

    /**
     * @var string
     */
    private $prefix;

    public function __construct(
        Memcached $memcached,
        string $prefix = self::DEFAULT_PREFIX,
        int $ttl = self::DEFAULT_TTL
    ) {
        $this->memcached = $memcached;
        $this->prefix = $prefix;
        $this->ttl = $ttl;
    }

    public function set(string $key, string $value): void
    {
        $this->memcached->set($this->normalizeKey($key), $value, $this->ttl);
    }

    public function get(string $key): ?string
    {
        return $this->memcached->get($this->normalizeKey($key));
    }

    public function has(string $key): bool
    {
        return (bool)$this->memcached->get($this->normalizeKey($key));
    }

    private function normalizeKey(string $key): string
    {
        return $this->prefix . $key;
    }

    public function setTtl(int $ttl): void
    {
        $this->ttl = $ttl;
    }

    public function setPrefix(string $prefix): void
    {
        $this->prefix = $prefix;
    }
}
