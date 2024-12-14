<?php

namespace SaaSFormation\Framework\SharedKernel\UI\HTTP;

interface NotEmptyResponseBodyInterface extends ResponseBodyInterface
{
    /**
     * @return array<mixed, mixed>
     */
    public function toArray(): array;
}