<?php

namespace SaaSFormation\Framework\Contracts\UI\HTTP;

class BadRequestException extends \Exception
{
    /**
     * @param array<string, string> $requestErrors
     * @param string $message
     * @param int $code
     * @param \Throwable|null $previous
     */
    public function __construct(private readonly array $requestErrors, string $message = "Bad request exception", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

    /**
     * @return array<string, string>
     */
    public function requestErrors(): array
    {
        return $this->requestErrors;
    }
}