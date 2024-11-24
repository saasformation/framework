<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Application\ReadModel;

use SaaSFormation\Framework\Contracts\Common\Identity\IdInterface;

interface ReadModelRepositoryInterface
{
    public function save(ReadModel $readModel): void;

    /**
     * @param array<string, mixed> $criteria
     * @return ?ReadModel
     */
    public function findOneByCriteria(array $criteria): ?ReadModel;

    /**
     * @param array<string, mixed> $criteria
     * @return array|ReadModel[]
     */
    public function findByCriteria(array $criteria): array;
}