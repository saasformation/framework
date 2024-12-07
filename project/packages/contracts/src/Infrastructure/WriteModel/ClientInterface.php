<?php

namespace SaaSFormation\Framework\Contracts\Infrastructure\WriteModel;

use SaaSFormation\Framework\Contracts\Common\Identity\IdInterface;
use SaaSFormation\Framework\Contracts\Domain\Aggregate;

interface ClientInterface
{
    public function beginTransaction(): void;
    public function commitTransaction(): void;
    public function rollbackTransaction(): void;
    public function save(Aggregate $aggregate): void;

    /**
     * @param IdInterface $aggregateId
     * @return array<int, array{'id': string, 'aggregate_id': string, 'aggregate_code': string, 'event_code': string, 'event_version': int, 'event_data': string, 'created_at': 'string'}>
     */
    public function events(IdInterface $aggregateId): array;
}