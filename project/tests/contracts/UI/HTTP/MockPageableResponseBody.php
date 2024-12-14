<?php

namespace SaaSFormation\Framework\Tests\Contracts\UI\HTTP;

use SaaSFormation\Framework\SharedKernel\UI\HTTP\PageableResponseBody;

class MockPageableResponseBody
{
    use PageableResponseBody;

    public function __construct(
        int $page,
        int $perPage,
        int $totalResults,
        int $totalPages
    )
    {
        $this->initializePageableResponseBody($page, $perPage, $totalResults, $totalPages);
    }
}