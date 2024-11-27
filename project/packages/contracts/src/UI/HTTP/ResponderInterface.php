<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\UI\HTTP;

use Psr\Http\Message\ResponseInterface;

interface ResponderInterface
{
    public function validForContentType(): string;

    /**
     * @param StatusEnum $statusCode
     * @param array<mixed, mixed>|null $data
     * @param array<string, string>|null $headers
     * @return ResponseInterface
     */
    public function respond(StatusEnum $statusCode, ?array $data = null, ?array $headers = null): ResponseInterface;
}