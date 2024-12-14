<?php declare(strict_types=1);

namespace SaaSFormation\Framework\SharedKernel\Application\Messages;

interface QueryInterface
{
    public function getQueryCode(): string;
}