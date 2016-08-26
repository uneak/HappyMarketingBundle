<?php

namespace Uneak\HappyMarketingBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class UneakHappyMarketingExtension extends Extension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $container->setParameter('api_url', $config['api_url']);
        $container->setParameter('auth_endpoint', $config['auth_endpoint']);
        $container->setParameter('token_endpoint', $config['token_endpoint']);
        $container->setParameter('auth_code_scope', $config['auth_code_scope']);
        $container->setParameter('client_id', $config['client_id']);
        $container->setParameter('client_secret', $config['client_secret']);

            
        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }
}
