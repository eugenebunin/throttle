<?php
declare(strict_types=1);

namespace Flexbe\Throttle;

use Flexbe\Throttle\Storage\Storage;

/**
 * Class Manager
 * @package Flexbe\Throttle
 */
class Manager implements Factory
{
    /**
     * @var Storage
     */
    private $storage;

    public function __construct(Storage $storage)
    {
        $this->storage = $storage;
    }

    public function make(Config $config): ThrottleInterface
    {
        $this->storage->setTtl($config->ttl());
        return new Throttle($this->storage, $config);
    }
}
