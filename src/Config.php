<?php
declare(strict_types=1);

namespace EugeneBunin\Throttle;

/**
 * Interface Config
 */
interface Config
{

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
