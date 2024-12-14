<?php

namespace SaaSFormation\Framework\SharedKernel\Application\EventDispatcher;

use SaaSFormation\Framework\SharedKernel\Domain\Messages\DomainEventInterface;

interface EventDispatcherInterface
{
    public function dispatch(DomainEventInterface $event): void;
}