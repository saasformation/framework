<?php

namespace SaaSFormation\Framework\Contracts\Application;

use SaaSFormation\Framework\Contracts\Domain\DomainEvent;

interface AsyncListenerInterface
{
    public function asyncListen(DomainEvent $event): void;
}