<?php

namespace SaaSFormation\Framework\Contracts\Domain;

class DomainEventStream
{
    /** @var array|DomainEvent[] */
    private array $events;

    public function __construct()
    {
        $this->clear();
    }

    public function add(DomainEvent $event): static
    {
        $this->events[] = $event;

        return $this;
    }

    /**
     * @return array|DomainEvent[]
     */
    public function events(): array
    {
        return $this->events;
    }

    private function clear(): void
    {
        $this->events = [];
    }
}