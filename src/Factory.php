<?php
declare(strict_types=1);

namespace EugeneBunin\Throttle;

/**
 * Interface Factory
 */
interface Factory
{
    public function make(Config $config): ThrottleInterface;
}
