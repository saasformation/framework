<?php declare(strict_types=1);

namespace SaaSFormation\Framework\SharedKernel\Application\Messages;

use SaaSFormation\Framework\SharedKernel\Common\Identity\IdInterface;

interface CommandInterface
{
    public function getCommandId(): ?IdInterface;
    public function getRequestId(): ?IdInterface;
    public function getCorrelationId(): ?IdInterface;
    public function getExecutorId(): ?IdInterface;
    public function setCommandId(IdInterface $commandId): void;
    public function setRequestId(IdInterface $requestId): void;
    public function setCorrelationId(IdInterface $correlationId): void;
    public function setExecutorId(IdInterface $executorId): void;
    public function getCommandCode(): string;
}