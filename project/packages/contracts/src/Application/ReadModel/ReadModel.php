<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Application\ReadModel;

use SaaSFormation\Framework\Contracts\Common\Identity\IdInterface;

abstract class ReadModel
{
    public function __construct(private ?IdInterface $id = null)
    {
    }

    public function id(): ?IdInterface
    {
        return $this->id;
    }

    public function setId(IdInterface $id): void
    {
        $this->id = $id;
    }

    /**
     * @return array<mixed>
     */
    public abstract function toArray(): array;

    /**
     * @param string $id
     * @param array<mixed> $data
     * @return static
     */
    public static abstract function fromArray(string $id, array $data): static;
    public static abstract function code(): string;
}