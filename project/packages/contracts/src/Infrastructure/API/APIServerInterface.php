<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Infrastructure\API;

interface APIServerInterface
{
    public function start(?RequestProcessorInterface $requestProcessor = null, ?RequestErrorProcessorInterface $requestErrorProcessor = null): void;
}