<?php

namespace SaaSFormation\Framework\SharedKernel\Domain;

use SaaSFormation\Framework\SharedKernel\Common\Identity\IdInterface;

interface AggregateInterface
{
    public function getId(): IdInterface;
    public function getEventStream(): DomainEventStream;
    public function aggregateCode(): string;
}