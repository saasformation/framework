<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Infrastructure;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;

interface ContainerProviderInterface
{
    public function provide(LoggerInterface $logger): ContainerInterface;
}