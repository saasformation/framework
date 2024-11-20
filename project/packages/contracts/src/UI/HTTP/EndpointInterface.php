<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\UI\HTTP;

interface EndpointInterface
{
    public function execute(): ArrayableInterface;
}