<?php

namespace SaaSFormation\Framework\Contracts\Application\Bus;

trait PageableQueryResult
{
    private int $page;
    private int $perPage;
    private int $totalResults;
    private int $totalPages;

    public function initializePageableQueryResult(
        int $page,
        int $perPage,
        int $totalResults,
        int $totalPages
    ): void
    {
        $this->page = $page;
        $this->perPage = $perPage;
        $this->totalResults = $totalResults;
        $this->totalPages = $totalPages;
    }

    public function page(): int
    {
        return $this->page;
    }

    public function perPage(): int
    {
        return $this->perPage;
    }

    public function totalResults(): int
    {
        return $this->totalResults;
    }

    public function totalPages(): int
    {
        return $this->totalPages;
    }
}