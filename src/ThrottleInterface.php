<?php
declare(strict_types=1);

namespace EugeneBunin\Throttle;

use EugeneBunin\Throttle\Exceptions\LimitReachedException;

/**
 * Interface ThrottleInterface
 * @package EugeneBunin\Throttle
 */
interface ThrottleInterface
{
    const ERROR_LIMIT_REACHED = 'Attempts limit reached';

    /**
     * @param Request $request
     * @throws LimitReachedException
     */
    public function attempt(Request $request): void;
}
