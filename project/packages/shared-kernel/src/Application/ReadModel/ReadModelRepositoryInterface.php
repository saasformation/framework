<?php declare(strict_types=1);

namespace SaaSFormation\Framework\SharedKernel\Application\ReadModel;

use SaaSFormation\Framework\SharedKernel\Application\Messages\QueryInterface;
use SaaSFormation\Framework\SharedKernel\Domain\Messages\DomainEventInterface;

interface ReadModelRepositoryInterface
{
    public function save(DomainEventInterface $domainEvent, AbstractReadModel $readModel): void;

    /**
     * @param QueryInterface $query
     * @param array<string, mixed> $criteria
     * @return ?AbstractReadModel
     */
    public function findOneByCriteria(QueryInterface $query, array $criteria): ?AbstractReadModel;

    /**
     * @param QueryInterface $query
     * @param array<string, mixed> $criteria
     * @return RepositoryCollectionResult
     */
    public function findByCriteria(QueryInterface $query, array $criteria): RepositoryCollectionResult;
}