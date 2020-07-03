<?php
declare(strict_types=1);

namespace Flexbe\Throttle;

/**
 * Interface Config
 */
interface Config
{
    const DEFAULT_TTL = 3360;
    const DEFAULT_ATTEMPTS = 5;

    /**
     * Time To Live in seconds
     * @return int
     */
    public function ttl(): int;

    /**
     * Max attempts
     * @return int
     */
    public function attempts(): int;

    /**
     * Storage key prefix
     * @return string
     */
    public function prefix(): string;
}
