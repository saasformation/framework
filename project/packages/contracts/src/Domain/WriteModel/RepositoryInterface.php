<?php

namespace SaaSFormation\Framework\Contracts\Domain\WriteModel;

use SaaSFormation\Framework\Contracts\Common\Identity\IdInterface;
use SaaSFormation\Framework\Contracts\Domain\Aggregate;

interface RepositoryInterface
{
    public function save(Aggregate $aggregate): void;
    public function hasAggregate(IdInterface $id): bool;
}