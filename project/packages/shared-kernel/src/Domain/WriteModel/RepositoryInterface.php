<?php

namespace SaaSFormation\Framework\SharedKernel\Domain\WriteModel;

use SaaSFormation\Framework\SharedKernel\Common\Identity\IdInterface;
use SaaSFormation\Framework\SharedKernel\Domain\Messages\DomainEventInterface;

interface RepositoryInterface
{
    public function save(DomainEventInterface $domainEvent): void;
    public function hasAggregate(IdInterface $id): bool;
}