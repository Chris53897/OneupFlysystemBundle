<?php

namespace Oneup\FlysystemBundle\Tests;

use League\Flysystem\FilesystemInterface;
use League\Flysystem\PluginInterface;
use Oneup\FlysystemBundle\Tests\Model\ContainerAwareTestCase;

class PluginTest extends ContainerAwareTestCase
{
    public function testIfSinglePluginIsAttached(): void
    {
        /** @var FilesystemInterface $filesystem */
        $filesystem = self::$container->get('oneup_flysystem.myfilesystem_filesystem');

        $refl = new \ReflectionObject($filesystem);
        $property = $refl->getProperty('plugins');

        $plugins = $property->getValue($filesystem);

        $this->assertIsArray($plugins);

        foreach ($plugins as $plugin) {
            $this->assertInstanceOf(PluginInterface::class, $plugin);
        }
    }

    public function testIfAllPluginsAreAttachedCorrectly(): void
    {
        /** @var FilesystemInterface $filesystem */
        $filesystem = self::$container->get('oneup_flysystem.myfilesystem2_filesystem');

        $refl = new \ReflectionObject($filesystem);
        $property = $refl->getProperty('plugins');

        $plugins = $property->getValue($filesystem);

        $this->assertIsArray($plugins);
        $this->assertCount(2, $plugins);

        foreach ($plugins as $plugin) {
            $this->assertInstanceOf(PluginInterface::class, $plugin);
        }
    }

    public function testIfGlobalPluginIsAttached(): void
    {
        /** @var FilesystemInterface $filesystem */
        $filesystem = self::$container->get('oneup_flysystem.myfilesystem3_filesystem');

        $refl = new \ReflectionObject($filesystem);
        $property = $refl->getProperty('plugins');

        $plugins = $property->getValue($filesystem);

        $this->assertIsArray($plugins);
        $this->assertCount(1, $plugins);

        foreach ($plugins as $plugin) {
            $this->assertInstanceOf(PluginInterface::class, $plugin);
        }
    }
}
