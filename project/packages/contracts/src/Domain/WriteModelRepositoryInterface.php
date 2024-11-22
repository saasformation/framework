<?php

namespace SaaSFormation\Framework\Contracts\Domain;

use SaaSFormation\Framework\Contracts\Common\Identity\IdInterface;

interface WriteModelRepositoryInterface
{
    public function save(Aggregate $aggregate): void;
    public function hasAggregate(IdInterface $id): bool;
}