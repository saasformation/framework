<?php declare(strict_types=1);

namespace SaaSFormation\Framework\SharedKernel\Application\Messages;

use SaaSFormation\Framework\SharedKernel\Common\Identity\IdInterface;

interface QueryInterface
{
    public function getRequestId(): ?IdInterface;

    public function setRequestId(IdInterface $requestId): void;

    public function getQueryCode(): string;
}