<?php

namespace SaaSFormation\Framework\SharedKernel\Application\ReadModel;

final readonly class RepositoryCollectionResult
{
    public int $totalResultsRetrieved;

    /**
     * @param int $totalResults
     * @param array<int, AbstractReadModel> $readModels
     */
    public function __construct(public int $totalResults, public array $readModels)
    {
        $this->totalResultsRetrieved = count($this->readModels);
    }
}