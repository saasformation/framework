<?php

namespace SaaSFormation\Framework\Contracts\Application\EventDispatcher;

use SaaSFormation\Framework\Contracts\Domain\DomainEvent;

interface EventDispatcherInterface
{
    public function dispatch(DomainEvent $event): void;
}