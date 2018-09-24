<?php
/**
 * Created by PhpStorm.
 * User: zogxray
 * Date: 31.05.18
 * Time: 12:09
 */

namespace Micseres\MicroClientBundle\Tests;

use Micseres\MicroClientBundle\DependencyInjection\MicroClientExtension;
use Micseres\MicroClientBundle\MicroClientBundle;
use PHPUnit\Framework\TestCase;

/**
 * Class MicroServiceBundleTest
 * @package Micseres\MicroClientBundle\Tests
 */
class MicroClientBundleTest extends TestCase
{
    public function testGetContainerExtension()
    {
        $bundle = new MicroClientBundle();

        $extension = $bundle->getContainerExtension();

        $this->assertInstanceOf(MicroClientExtension::class, $extension);
    }
}