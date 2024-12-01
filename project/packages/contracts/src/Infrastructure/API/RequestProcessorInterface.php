<?php

namespace SaaSFormation\Framework\Contracts\Infrastructure\API;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface RequestProcessorInterface
{
    public function processRequest(ServerRequestInterface $request): ResponseInterface;
}