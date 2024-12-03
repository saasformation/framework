<?php

namespace SaaSFormation\Framework\Tests\Contracts\Application\Bus;

use SaaSFormation\Framework\Contracts\Application\Bus\PageableQuery;

class MockPageableQuery
{
    use PageableQuery;

    public function __construct(int $page, int $perPage)
    {
        $this->initializePageableQuery($page, $perPage);
    }
}