<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Projects\UI\API\HTTP;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use ReflectionMethod;
use SaaSFormation\ArrayByPath\RetrieveArrayValueByPathService;
use SaaSFormation\Field\StandardField;
use SaaSFormation\Framework\Contracts\Application\Bus\CommandBusInterface;
use SaaSFormation\Framework\Contracts\Application\Bus\QueryBusInterface;
use SaaSFormation\Framework\Contracts\UI\HTTP\ArrayableInterface;
use SaaSFormation\Framework\Contracts\UI\HTTP\EndpointInterface;
use SaaSFormation\Framework\Contracts\UI\HTTP\ResponderInterface;
use SaaSFormation\Framework\Contracts\UI\HTTP\StatusEnum;
use SaaSFormation\Framework\Projects\UI\API\HTTP\Attributes\StatusCode;

abstract readonly class Endpoint implements EndpointInterface
{
    /**
     * @param string $defaultResponseContentType
     * @param LoggerInterface $logger
     * @param CommandBusInterface $commandBus
     * @param QueryBusInterface $queryBus
     * @param RetrieveArrayValueByPathService $retrieveArrayValueByPathService
     * @param array<string, ResponderInterface> $responders
     */
    public function __construct(
        private string                          $defaultResponseContentType,
        private LoggerInterface                 $logger,
        protected CommandBusInterface           $commandBus,
        protected QueryBusInterface             $queryBus,
        private RetrieveArrayValueByPathService $retrieveArrayValueByPathService,
        private array                           $responders)
    {
    }

    public function doExecute(ServerRequestInterface $request): ResponseInterface
    {
        $responseBody = $this->execute($request);

        $accept = explode(',', $request->getHeaderLine('Accept'));

        $response = $this->responders[$this->defaultResponseContentType]->respond(StatusEnum::HTTP_NOT_ACCEPTABLE);

        foreach ($accept as $format) {
            if (isset($this->responders[$format])) {
                $data = null;
                if ($responseBody instanceof ArrayableInterface) {
                    $data = $responseBody->toArray();
                }
                $response = $this->responders[$request->getHeaderLine('Accept')]->respond($this->getResponseDefaultStatusCode(), $data);
                break;
            }
        }

        return $response;
    }

    protected function body(ServerRequestInterface $request, string $path): StandardField
    {
        return $this->getFromBodyRequestByPath($request, $path);
    }

    private function getFromBodyRequestByPath(ServerRequestInterface $request, string $path): StandardField
    {
        $body = $request->getBody();
        $body->rewind();
        $body = json_decode($body->getContents(), true);

        if (!is_array($body)) {
            throw new \Exception("Cannot retrieve body");
        }

        return new StandardField($this->retrieveArrayValueByPathService->find($path, $body));
    }

    private function getResponseDefaultStatusCode(): StatusEnum
    {
        $reflectedMethod = new ReflectionMethod(get_class($this), 'execute');
        $attributes = $reflectedMethod->getAttributes(StatusCode::class);

        if (count($attributes) === 1) {
            $statusCode = $attributes[0]->getArguments()[0];
        } else {
            $statusCode = StatusEnum::HTTP_OK;
            $this->logger->warning('Endpoint ' . get_class($this) . ' has no success status code set');
        }

        return $statusCode;
    }
}