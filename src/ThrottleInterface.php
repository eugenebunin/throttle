<?php
declare(strict_types=1);

namespace Flexbe\Throttle;

use Flexbe\Exceptions\LimitReachedException;

/**
 * Interface ThrottleInterface
 * @package Flexbe\Throttle
 */
interface ThrottleInterface
{
    const ERROR_LIMIT_REACHED = 'Limit reached';
    /**
     *
     * @param Request $request
     * @throws LimitReachedException
     */
    public function attempt(Request $request): void;
}
