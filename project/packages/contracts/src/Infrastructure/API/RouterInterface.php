<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Infrastructure\API;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface RouterInterface
{
    public function route(ServerRequestInterface $request): ResponseInterface;
}