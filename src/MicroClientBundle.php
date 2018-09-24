<?php
/**
 * Created by PhpStorm.
 * User: zogxray
 * Date: 12.09.18
 * Time: 15:43
 */

namespace Micseres\MicroClientBundle;

use Micseres\MicroClientBundle\DependencyInjection\MicroClientExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class MicroServiceBundle
 * @package Micseres\MicroClientBundle
 */
class MicroClientBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
    }

    /**
     * Register Bundle Extension
     *
     * @return MicroClientExtension
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new MicroClientExtension();
        }

        return $this->extension;
    }
}