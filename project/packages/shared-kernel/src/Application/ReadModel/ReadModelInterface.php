<?php declare(strict_types=1);

namespace SaaSFormation\Framework\SharedKernel\Application\ReadModel;

use SaaSFormation\Framework\SharedKernel\Common\Identity\IdInterface;

interface ReadModelInterface
{
    public function getReadModelId(): ?IdInterface;

    public function setReadModelId(IdInterface $readModelId): void;

    /**
     * @return array<mixed>
     */
    public function toArray(): array;

    /**
     * @param string $id
     * @param array<mixed> $data
     * @return static
     */
    public static function fromArray(string $id, array $data): static;
    public static function code(): string;
}