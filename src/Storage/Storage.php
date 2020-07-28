<?php
declare(strict_types=1);

namespace EugeneBunin\Throttle\Storage;

/**
 * Interface Storage
 * @package EugeneBunin\Throttle\Storage
 */
interface Storage
{
    public function set(string $key, string $value): void;

    public function get(string $key): ?string;

    public function has(string $key): bool;

    public function setTtl(int $ttl): void;

    public function setPrefix(string $prefix): void;
}
