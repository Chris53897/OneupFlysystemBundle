<?php

namespace Oneup\FlysystemBundle\Tests\Model;

use League\Flysystem\FilesystemInterface;
use League\Flysystem\PluginInterface;

class Plugin implements PluginInterface
{
    protected FilesystemInterface $filesystem;

    public function setFilesystem(FilesystemInterface $filesystem): void
    {
        $this->filesystem = $filesystem;
    }

    public function getMethod(): string
    {
        // we return a unique handler
        // so we can attach this class
        // to multiple filesystems
        return uniqid('', true);
    }

    public function handle($path = null)
    {
        return $path;
    }
}
