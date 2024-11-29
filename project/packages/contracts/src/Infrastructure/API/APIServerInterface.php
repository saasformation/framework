<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Infrastructure\API;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface APIServerInterface
{
    public function start(): void;

    public function processRequest(ServerRequestInterface $request): ResponseInterface;

    public function processError(ServerRequestInterface $request, \Throwable $exception): ResponseInterface;
}