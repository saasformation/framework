<?php

namespace SaaSFormation\Framework\SharedKernel\Application\Messages;

use SaaSFormation\Framework\SharedKernel\Common\Identity\IdInterface;

abstract class AbstractQuery implements QueryInterface
{
    private ?IdInterface $requestId = null;

    public function getRequestId(): ?IdInterface
    {
        return $this->requestId;
    }

    public function setRequestId(IdInterface $requestId): void
    {
        $this->requestId = $requestId;
    }
}