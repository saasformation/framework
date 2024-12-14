<?php declare(strict_types=1);

namespace SaaSFormation\Framework\SharedKernel\Application\EventDispatcher;

use SaaSFormation\Framework\SharedKernel\Domain\Messages\DomainEventInterface;

interface ListenerInterface
{
    public function listen(DomainEventInterface $event): void;
}