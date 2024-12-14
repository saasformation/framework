<?php declare(strict_types=1);

namespace SaaSFormation\Framework\SharedKernel\UI\HTTP;

use Psr\Http\Message\ServerRequestInterface;

interface EndpointInterface
{
    public function execute(ServerRequestInterface $request): ResponseBodyInterface;
}