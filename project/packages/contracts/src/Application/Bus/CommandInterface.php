<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Application\Bus;

interface CommandInterface
{
    public function name(): string;
}