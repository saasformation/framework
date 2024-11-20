<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\UI\HTTP;

interface ArrayableInterface
{
    /**
     * @return array<mixed, mixed>
     */
    public function toArray(): array;
}