<?php declare(strict_types=1);

namespace SaaSFormation\Framework\SharedKernel\Application\ReadModel;

interface ReadModelRepositoryInterface
{
    public function save(AbstractReadModel $readModel): void;

    /**
     * @param array<string, mixed> $criteria
     * @return ?AbstractReadModel
     */
    public function findOneByCriteria(array $criteria): ?AbstractReadModel;

    /**
     * @param array<string, mixed> $criteria
     * @return RepositoryCollectionResult
     */
    public function findByCriteria(array $criteria): RepositoryCollectionResult;
}