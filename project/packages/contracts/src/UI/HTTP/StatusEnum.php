<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\UI\HTTP;

enum StatusEnum: int
{
    case HTTP_OK = 200;
    case HTTP_CREATED = 201;
    case HTTP_ACCEPTED = 202;
    case HTTP_ACCEPTED_NO_CONTENT = 204;
    case HTTP_NO_CONTENT = 205;
    case HTTP_BAD_REQUEST = 400;
    case HTTP_UNAUTHORIZED = 401;
    case HTTP_FORBIDDEN = 403;
    case HTTP_NOT_FOUND = 404;
    case HTTP_METHOD_NOT_ALLOWED = 405;
    case HTTP_NOT_ACCEPTABLE = 406;
    case HTTP_GENERAL_ERROR = 500;
}
