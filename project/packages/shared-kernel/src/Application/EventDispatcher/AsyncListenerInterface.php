<?php

namespace SaaSFormation\Framework\SharedKernel\Application\EventDispatcher;

use SaaSFormation\Framework\SharedKernel\Domain\Messages\AbstractDomainEvent;

interface AsyncListenerInterface
{
    public function asyncListen(AbstractDomainEvent $event): void;
}