<?php
declare(strict_types=1);

namespace Tests\Mock;

use Flexbe\Throttle\Request as RequestAlias;

/**
 * Class Request
 * @package Tests\Mock
 */
class Request implements RequestAlias
{
    private $token;

    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function token(): string
    {
        return $this->token;
    }
}
