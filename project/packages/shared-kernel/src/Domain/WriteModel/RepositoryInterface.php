<?php

namespace SaaSFormation\Framework\SharedKernel\Domain\WriteModel;

use SaaSFormation\Framework\SharedKernel\Application\Messages\CommandInterface;
use SaaSFormation\Framework\SharedKernel\Common\Identity\IdInterface;
use SaaSFormation\Framework\SharedKernel\Domain\AggregateInterface;
use SaaSFormation\Framework\SharedKernel\Domain\Messages\DomainEventInterface;

interface RepositoryInterface
{
    public function save(DomainEventInterface $domainEvent): void;
    public function saveCommand(CommandInterface $command): void;
    public function hasAggregate(IdInterface $id): bool;
}