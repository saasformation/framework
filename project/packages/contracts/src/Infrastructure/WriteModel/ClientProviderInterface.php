<?php

namespace SaaSFormation\Framework\Contracts\Infrastructure\WriteModel;

use Psr\Log\LoggerInterface;
use SaaSFormation\Framework\Contracts\Common\Identity\UUIDFactoryInterface;

interface ClientProviderInterface
{
    public function provide(): ClientInterface;
}