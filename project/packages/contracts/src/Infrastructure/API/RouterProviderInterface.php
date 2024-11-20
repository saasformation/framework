<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Infrastructure\API;

use Psr\Container\ContainerInterface;

interface RouterProviderInterface
{
    public function provide(ContainerInterface $container): RouterInterface;
}