<?php

namespace SaaSFormation\Framework\Contracts\Infrastructure\WriteModel;

interface ClientProviderInterface
{
    public function provide(): ClientInterface;
}