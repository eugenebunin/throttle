<?php
declare(strict_types=1);

namespace Flexbe\Throttle;

/**
 * Interface Request
 * @package Flexbe\Throttle
 */
interface Request
{
    public function token(): string;
}
