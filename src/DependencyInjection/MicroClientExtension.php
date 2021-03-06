<?php
/**
 * Created by PhpStorm.
 * User: zogxray
 * Date: 12.09.18
 * Time: 15:46
 */

namespace Micseres\MicroClientBundle\DependencyInjection;

use Micseres\MicroClientReactor\MicroClientReactor;
use Micseres\MicroClientReactor\MicroClientReactorInterface;
use Symfony\Component\Config\Definition\Exception\InvalidConfigurationException;
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
        $default = $config['default_connection'];
        if (!array_key_exists($default, $config['connections'])) {
           throw new InvalidConfigurationException("connection '{$default}' not found and cannot be set as default");
        }
        foreach ($config['connections'] as $key => $connection) {
            $container->register("m_client.{$key}_reactor", MicroClientReactor::class)
                ->addArgument($connection['ip'])
                ->addArgument($connection['port'])
                ->addArgument($connection['wait'])
                ->setPublic(true);
        }
        $container->addAliases([MicroClientReactorInterface::class => "m_client.{$default}_reactor"]);
    }
}
