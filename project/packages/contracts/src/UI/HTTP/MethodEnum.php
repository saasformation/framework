<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\UI\HTTP;

enum MethodEnum: string
{
    case GET = 'GET';
    case POST = 'POST';
    case PUT = 'PUT';
    case DELETE = 'DELETE';
    case PATCH = 'PATCH';
    case OPTIONS = 'OPTIONS';
}
