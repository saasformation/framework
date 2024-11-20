<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Infrastructure;

interface EnvVarsManagerInterface
{
    public function has(string $key): bool;
    public function get(string $key): string|bool|int|float|object;
}