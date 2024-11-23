<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Application\Bus;

use SaaSFormation\Framework\Contracts\Domain\DomainEventStream;

interface CommandBusInterface
{
    public function handle(CommandInterface $command): DomainEventStream;
}