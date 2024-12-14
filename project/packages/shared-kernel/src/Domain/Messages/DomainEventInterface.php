<?php

namespace SaaSFormation\Framework\SharedKernel\Domain\Messages;

use SaaSFormation\Framework\SharedKernel\Common\Identity\IdInterface;

interface DomainEventInterface
{
    public function getDomainEventId(): ?IdInterface;

    public function getAggregateId(): IdInterface;
    public function getAggregateCode(): string;

    public function getRequestId(): ?IdInterface;

    public function getCorrelationId(): ?IdInterface;

    public function getGeneratorCommandId(): ?IdInterface;

    public function setDomainEventId(IdInterface $domainEventId): void;

    public function setRequestId(IdInterface $requestId): void;

    public function setCorrelationId(IdInterface $correlationId): void;

    public function setGeneratorCommandId(IdInterface $generatorCommandId): void;

    public static function getDomainEventCode(): string;

    public function getDomainEventVersion(): int;

    /**
     * @return array<mixed, mixed>
     */
    public function toArray(): array;
}