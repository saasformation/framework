<?php

namespace SaaSFormation\Framework\Contracts\Application\Bus;

interface QueryHandlerInterface
{
    public function ask(QueryInterface $query): QueryResultInterface;
}