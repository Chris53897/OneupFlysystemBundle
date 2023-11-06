<?php


namespace Oneup\FlysystemBundle\StreamWrapper;

use League\Flysystem\FilesystemInterface;

class Configuration
{
    public function __construct(private readonly string              $protocol,
                                private readonly FilesystemInterface $filesystem,
                                private readonly ?array              $configuration = null)
    {
    }

    public function getProtocol(): string
    {
        return $this->protocol;
    }

    public function getFilesystem(): FilesystemInterface
    {
        return $this->filesystem;
    }

    public function getConfiguration(): ?array
    {
        return $this->configuration;
    }
}
