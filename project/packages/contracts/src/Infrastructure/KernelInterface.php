<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Infrastructure;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

interface KernelInterface
{
    public function logger(): LoggerInterface;

    public function envVarsManager(): EnvVarsManagerInterface;

    public function container(): ContainerInterface;
}