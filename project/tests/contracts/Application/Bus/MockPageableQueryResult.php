<?php

namespace SaaSFormation\Framework\Tests\Contracts\Application\Bus;

use SaaSFormation\Framework\SharedKernel\Application\Messages\PageableQueryResult;

class MockPageableQueryResult
{
    use PageableQueryResult;

    public function __construct(
        int $page,
        int $perPage,
        int $totalResults,
        int $totalPages
    )
    {
        $this->initializePageableQueryResult($page, $perPage, $totalResults, $totalPages);
    }
}