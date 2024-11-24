<?php

namespace SaaSFormation\Framework\Contracts\Domain;

use SaaSFormation\Framework\Contracts\Common\Identity\IdInterface;
use SaaSFormation\Framework\Contracts\UI\HTTP\ArrayableInterface;

readonly abstract class DomainEvent implements ArrayableInterface
{
    public function __construct(private IdInterface $aggregateId, private ?IdInterface $id = null)
    {
    }

    public function id(): ?IdInterface
    {
        return $this->id;
    }

    public function aggregateId(): IdInterface
    {
        return $this->aggregateId;
    }

    public static abstract function code(): string;
    public abstract function version(): int;
}