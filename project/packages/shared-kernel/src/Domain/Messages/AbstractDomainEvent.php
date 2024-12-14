<?php declare(strict_types=1);

namespace SaaSFormation\Framework\SharedKernel\Domain\Messages;

use SaaSFormation\Framework\SharedKernel\Common\Identity\IdInterface;

abstract class AbstractDomainEvent implements DomainEventInterface
{
    private ?IdInterface $domainEventId = null;
    private IdInterface $aggregateId;
    private string $aggregateCode;
    private ?IdInterface $requestId = null;
    private ?IdInterface $correlationId = null;
    private ?IdInterface $generatorCommandId = null;

    public function __construct(IdInterface $aggregateId, string $aggregateCode)
    {
        $this->aggregateId = $aggregateId;
        $this->aggregateCode = $aggregateCode;
    }

    public function getDomainEventId(): ?IdInterface
    {
        return $this->domainEventId;
    }

    public function getAggregateId(): IdInterface
    {
        return $this->aggregateId;
    }

    public function getAggregateCode(): string
    {
        return $this->aggregateCode;
    }

    public function getRequestId(): ?IdInterface
    {
        return $this->requestId;
    }

    public function getCorrelationId(): ?IdInterface
    {
        return $this->correlationId;
    }

    public function getGeneratorCommandId(): ?IdInterface
    {
        return $this->generatorCommandId;
    }

    public function setDomainEventId(IdInterface $domainEventId): void
    {
        $this->domainEventId = $domainEventId;
    }

    public function setRequestId(IdInterface $requestId): void
    {
        $this->requestId = $requestId;
    }

    public function setCorrelationId(IdInterface $correlationId): void
    {
        $this->correlationId = $correlationId;
    }

    public function setGeneratorCommandId(IdInterface $generatorCommandId): void
    {
        $this->generatorCommandId = $generatorCommandId;
    }
}