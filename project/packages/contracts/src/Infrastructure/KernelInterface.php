<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Infrastructure;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use Throwable;

interface KernelInterface
{
    public function logger(): LoggerInterface;

    public function envVarsManager(): EnvVarsManagerInterface;

    public function container(): ContainerInterface;

    public function processRequest(ServerRequestInterface $request): ResponseInterface;

    public function processError(ServerRequestInterface $request, Throwable $exception): ResponseInterface;
}