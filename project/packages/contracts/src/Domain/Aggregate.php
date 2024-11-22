<?php

namespace SaaSFormation\Framework\Contracts\Domain;

use SaaSFormation\Framework\Contracts\Common\Identity\IdInterface;

abstract class Aggregate
{
    private DomainEventStream $eventStream;

    protected function __construct(private IdInterface $id)
    {
        $this->eventStream = new DomainEventStream();
    }

    protected function fire(DomainEvent $event): void
    {
        $this->eventStream->add($event);
    }

    public function id(): IdInterface
    {
        return $this->id;
    }

    public function eventStream(): DomainEventStream
    {
        return $this->eventStream;
    }

    public abstract function code(): string;
}