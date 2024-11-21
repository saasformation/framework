<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Application\Bus;

interface QueryInterface
{
    public function name(): string;
}