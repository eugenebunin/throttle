<?php
declare(strict_types=1);

namespace EugeneBunin\Throttle;

use EugeneBunin\Throttle\Exceptions\LimitReachedException;
use EugeneBunin\Throttle\Storage\Storage;

/**
 * Class Throttle
 * @package EugeneBunin\Throttle
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
        if (!$this->storage->has($request->subject())) {
            $this->storage->set($request->subject(), '1');
        } else {
            $attempts = (int)$this->storage->get($request->subject());
            if ($attempts > $this->maxAttempts()) {
                throw new LimitReachedException(sprintf(self::ERROR_LIMIT_REACHED . ': %s', $this->maxAttempts()));
            } else {
                $attempts++;
                $this->storage->set($request->subject(), (string)$attempts);
            }
        }
    }

    protected function maxAttempts(): int
    {
        return $this->config->attempts();
    }
}
