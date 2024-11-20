<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Infrastructure;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use SaaSFormation\Framework\EnvVarsManager\Infrastructure\EnvVarsManager;
use Throwable;

interface KernelInterface
{
    public function start(): void;

    public function logger(): LoggerInterface;

    public function envVarsManager(): EnvVarsManagerInterface;

    public function processRequest(ServerRequestInterface $request): ResponseInterface;

    public function processError(ServerRequestInterface $request, Throwable $exception): ResponseInterface;
}