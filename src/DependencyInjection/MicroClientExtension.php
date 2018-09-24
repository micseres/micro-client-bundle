<?php
/**
 * Created by PhpStorm.
 * User: zogxray
 * Date: 12.09.18
 * Time: 15:46
 */

namespace Micseres\MicroClientBundle\DependencyInjection;

use Micseres\MicroClientReactor\MicroClientReactor;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

/**
 * Class MicroServiceExtension
 * @package Micseres\MicroClientBundle\DependencyInjection
 */
class MicroClientExtension extends Extension
{
    /**
     * {@inheritdoc}
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = $this->getConfiguration($configs, $container);
        $config = $this->processConfiguration($configuration, $configs);

        foreach ($config['connections'] as $key => $connection) {
            $container->register("m_client.{$key}_reactor", MicroClientReactor::class)
                ->addArgument($connection['ip'])
                ->addArgument($connection['port'])
                ->addArgument($connection['route'])
                ->addArgument($connection['wait'])
                ->setPublic(true);
        }
    }
}
