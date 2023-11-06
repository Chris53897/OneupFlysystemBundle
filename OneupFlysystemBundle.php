<?php

namespace Oneup\FlysystemBundle;

use Oneup\FlysystemBundle\DependencyInjection\Compiler\FilesystemPass;
use Oneup\FlysystemBundle\StreamWrapper\StreamWrapperManager;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class OneupFlysystemBundle extends Bundle
{
    public function build(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new FilesystemPass());
    }

    /**
     * @throws \Exception
     */
    public function boot(): void
    {
        parent::boot();

        /* @var StreamWrapperManager $manager */
        if ($manager = $this->container->get('oneup_flysystem.stream_wrapper.manager', ContainerInterface::NULL_ON_INVALID_REFERENCE)) {
            $manager->register();
        }
    }

    /**
     * @throws \Exception
     */
    public function shutdown(): void
    {
        parent::shutdown();

        /* @var StreamWrapperManager $manager */
        if ($manager = $this->container->get('oneup_flysystem.stream_wrapper.manager', ContainerInterface::NULL_ON_INVALID_REFERENCE)) {
            $manager->unregister();
        }
    }
}
