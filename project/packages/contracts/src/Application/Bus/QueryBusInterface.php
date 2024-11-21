<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Application\Bus;

interface QueryBusInterface
{
    public function ask(QueryInterface $query): QueryResultInterface;
}