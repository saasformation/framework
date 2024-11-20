<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Infrastructure;

interface EnvVarsManagerProviderInterface
{
    public function provide(): EnvVarsManagerInterface;
}