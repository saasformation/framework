<?php declare(strict_types=1);

namespace SaaSFormation\Framework\SharedKernel\Application\ReadModel;

use SaaSFormation\Framework\SharedKernel\Common\Identity\IdInterface;

abstract class AbstractReadModel implements ReadModelInterface
{
    private ?IdInterface $readModelId = null;

    public function getReadModelId(): ?IdInterface
    {
        return $this->readModelId;
    }

    public function setReadModelId(IdInterface $readModelId): void
    {
        $this->readModelId = $readModelId;
    }
}