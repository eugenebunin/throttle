<?php
declare(strict_types=1);

namespace eugenebunin\Throttle;

use eugenebunin\Throttle\Exceptions\LimitReachedException;

/**
 * Interface ThrottleInterface
 * @package eugenebunin\Throttle
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
