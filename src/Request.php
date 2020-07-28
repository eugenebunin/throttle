<?php
declare(strict_types=1);

namespace EugeneBunin\Throttle;

/**
 * Interface Request
 * @package EugeneBunin\Throttle
 */
interface Request
{
    public function subject(): string;
}
