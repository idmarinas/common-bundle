<?php

/**
 * This file is part of Bundle "IDM Advertising Bundle".
 *
 * @see https://github.com/idmarinas/advertising-bundle
 *
 * @license https://github.com/idmarinas/advertising-bundle/blob/master/LICENSE.txt
 * @author IDMarinas
 *
 * @since 0.1.0
 */

namespace Idm\Bundle\Common\Tests;

use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Nyholm\BundleTest\TestKernel;
use Idm\Bundle\Common\IdmCommonBundle;
use Symfony\Component\HttpKernel\KernelInterface;

class BundleInitializationTest extends KernelTestCase
{
    protected static function getKernelClass(): string
    {
        return TestKernel::class;
    }

    protected static function createKernel(array $options = []): KernelInterface
    {
        /**
         * @var TestKernel $kernel
         */
        $kernel = parent::createKernel($options);
        $kernel->addTestBundle(IdmCommonBundle::class);
        $kernel->handleOptions($options);

        return $kernel;
    }

    public function testInitBundle(): void
    {
        // Boot the kernel.
        self::bootKernel();

        $this->assertTrue(true);
    }

    // public function testBundleWithDifferentConfiguration(): void
    // {
    //     // Boot the kernel with a config closure, the handleOptions call in createKernel is important for that to work
    //     $kernel = self::bootKernel(['config' => static function(TestKernel $kernel){
    //         // Add some other bundles we depend on
    //         $kernel->addTestBundle(OtherBundle::class);

    //         // Add some configuration
    //         $kernel->addTestConfig(__DIR__.'/config.yml');
    //     }]);

    //     // ...
    // }
}
