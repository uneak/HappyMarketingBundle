<?php

namespace Uneak\HappyMarketingBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('uneak_happymarketing');

        $rootNode
            ->children()
                ->scalarNode('api_url')->end()
                ->scalarNode('auth_endpoint')->end()
                ->scalarNode('token_endpoint')->end()
                ->scalarNode('auth_code_scope')->end()
                ->scalarNode('client_id')->end()
                ->scalarNode('client_secret')->end()
            ->end()
        ;
        
        return $treeBuilder;
    }
}
