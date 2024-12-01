<?php

namespace SaaSFormation\Framework\Contracts\Infrastructure\API;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface RequestErrorProcessorInterface
{
    public function processError(ServerRequestInterface $request, \Throwable $exception): ResponseInterface;
}