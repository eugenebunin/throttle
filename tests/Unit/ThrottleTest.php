<?php

use Flexbe\Throttle\Exceptions\LimitReachedException;
use PHPUnit\Framework\TestCase;
use Tests\Mock\Storage;
use Tests\Mock\Config;
use Flexbe\Throttle\Throttle;
use Tests\Mock\Request;

class ThrottleTest extends TestCase
{
    /**
     * @var Throttle
     */
    protected $throttle;

    /**
     * @var Storage
     */
    protected $storage;

    public function setUp(): void
    {
        $this->storage = new Storage();
        $config = new Config();
        $this->throttle = new Throttle($this->storage, $config);
    }

    /**
     * @throws LimitReachedException
     * @expectedException LimitReachedException
     */
    public function testAttemptsReached()
    {
        $request = new Request('unique');
        $this->throttle->attempt($request);
        $this->throttle->attempt($request);
        $this->throttle->attempt($request);
        $this->assertEquals(3, Storage::$cache[$request->token()]);
    }
}
