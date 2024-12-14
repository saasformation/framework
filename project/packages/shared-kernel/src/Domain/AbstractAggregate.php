<?php

namespace SaaSFormation\Framework\SharedKernel\Domain;

use SaaSFormation\Framework\SharedKernel\Common\Identity\IdInterface;
use SaaSFormation\Framework\SharedKernel\Domain\Messages\AbstractDomainEvent;

abstract class AbstractAggregate implements AggregateInterface
{
    private IdInterface $id;
    private DomainEventStream $eventStream;

    protected function __construct(IdInterface $id)
    {
        $this->id = $id;
        $this->eventStream = new DomainEventStream();
    }

    public function getId(): IdInterface
    {
        return $this->id;
    }
    public function getEventStream(): DomainEventStream
    {
        return $this->eventStream;
    }

    protected function fire(AbstractDomainEvent $event): void
    {
        $this->eventStream->add($event);
    }
}