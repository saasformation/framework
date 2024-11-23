<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Application\Bus;

use SaaSFormation\Framework\Contracts\Domain\DomainEvent;

interface EventBusInterface
{
    public function listen(DomainEvent $event): void;
}