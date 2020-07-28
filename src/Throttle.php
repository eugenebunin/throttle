<?php
declare(strict_types=1);

namespace eugenebunin\Throttle;

use eugenebunin\Throttle\Exceptions\LimitReachedException;
use eugenebunin\Throttle\Storage\Storage;

/**
 * Class Throttle
 * @package eugenebunin\Throttle
 */
class Throttle implements ThrottleInterface
{

    /**
     * @var Storage
     */
    protected $storage;

    /**
     * @var Config
     */
    protected $config;

    public function __construct(Storage $storage, Config $config)
    {
        $this->storage = $storage;
        $this->config = $config;
    }

    /**
     * @param Request $request
     * @throws LimitReachedException
     */
    public function attempt(Request $request): void
    {
        if (!$this->storage->has($request->token())) {
            $this->storage->set($request->token(), '1');
        } else {
            $attempts = (int)$this->storage->get($request->token());
            if ($attempts > $this->maxAttempts()) {
                throw new LimitReachedException(sprintf(self::ERROR_LIMIT_REACHED . ': %s', $this->maxAttempts()));
            } else {
                $attempts++;
                $this->storage->set($request->token(), (string)$attempts);
            }
        }
    }

    protected function maxAttempts(): int
    {
        return $this->config->attempts();
    }
}
