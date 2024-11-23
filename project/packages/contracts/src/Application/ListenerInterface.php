<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Application;

use SaaSFormation\Framework\Contracts\Domain\DomainEvent;

interface ListenerInterface
{
    public function listen(DomainEvent $event): void;
}