<?php
declare(strict_types=1);

namespace Flexbe\Throttle;

/**
 * Interface Factory
 */
interface Factory
{
    public function make(Config $config): ThrottleInterface;
}
