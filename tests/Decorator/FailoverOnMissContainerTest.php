<?php

namespace Acclimate\Container\Test\Decorator;

use Acclimate\Container\Decorator\FailoverOnMissContainer;
use Acclimate\Container\ArrayContainer;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Acclimate\Container\Decorator\FailoverOnMissContainer
 */
class FailoverOnMissContainerTest extends TestCase
{
    public function testDecoratorExecutesCallbackForMissingItems()
    {
        $failover = new ArrayContainer(['foo' => new \SplQueue]);
        $container = new FailoverOnMissContainer(new ArrayContainer, $failover);
        $this->assertFalse($container->has('foo'));
        $this->assertInstanceOf('SplQueue', $container->get('foo'));
    }
}
