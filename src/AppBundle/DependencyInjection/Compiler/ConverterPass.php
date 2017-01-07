<?php

namespace AppBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class ConverterPass implements CompilerPassInterface
{
    const CONVERSION_SERVICE_ID = 'crv.service.conversion';
    const SERVICE_ID = 'crv.converter';

    public function process(ContainerBuilder $container)
    {
        // check if the conversion service is even defined
        // and if not, exit early
        if ( ! $container->has(self::CONVERSION_SERVICE_ID)) {
            return false;
        }

        $definition = $container->findDefinition(self::CONVERSION_SERVICE_ID);

        // find all the services that are tagged as converters
        $taggedServices = $container->findTaggedServiceIds(self::SERVICE_ID);

        foreach ($taggedServices as $id => $tag) {
            // add the service to the Service\Conversion::$converters array
            $definition->addMethodCall(
                'addConverter',
                [
                    new Reference($id)
                ]
            );
        }
    }
}