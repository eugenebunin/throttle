<?php
declare(strict_types=1);

namespace eugenebunin\Throttle;

/**
 * Interface Request
 * @package eugenebunin\Throttle
 */
interface Request
{
    public function token(): string;
}
