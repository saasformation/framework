<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Projects\Infrastructure;

use Assert\Assert;
use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Log\LoggerInterface;
use React\Http\Message\Response;
use SaaSFormation\Framework\Contracts\Infrastructure\API\RouterInterface;
use SaaSFormation\Framework\Contracts\Infrastructure\API\RouterProviderInterface;
use SaaSFormation\Framework\Contracts\Infrastructure\ContainerProviderInterface;
use SaaSFormation\Framework\Contracts\Infrastructure\EnvVarsManagerInterface;
use SaaSFormation\Framework\Contracts\Infrastructure\EnvVarsManagerProviderInterface;
use SaaSFormation\Framework\Contracts\Infrastructure\KernelInterface;
use Throwable;

class Kernel implements KernelInterface
{
    private ContainerInterface $container;
    private Logger $emergencyLogger;

    public function __construct(
        EnvVarsManagerProviderInterface $envVarsManagerProvider,
        ContainerProviderInterface $containerProvider,
        string $logLevelEnvVarName = "LOG_LEVEL"
    )
    {
        $this->emergencyLogger = new Logger('emergency_logger');

        $logLevel = Level::Debug;

        if(getenv($logLevelEnvVarName) !== false && in_array(getenv($logLevelEnvVarName), ['Debug', 'Info', 'Notice', 'Warning', 'Error', 'Critical', 'Alert', 'Emergency'])) {
            $logLevel = Level::fromName(getenv($logLevelEnvVarName));
        }

        $handler = new StreamHandler('php://stdout',  $logLevel);
        $handler->setFormatter(new JsonFormatter());
        $this->emergencyLogger->pushHandler($handler);

        if(!getenv($logLevelEnvVarName)) {
            $this->emergencyLogger->critical("No log level has set via LOG_LEVEL env var");
            die();
        }

        $envVarsManager = $this->loadEnvVarsManager($envVarsManagerProvider);
        $this->loadContainer($containerProvider, $envVarsManager);
    }

    public function container(): ContainerInterface
    {
        return $this->container;
    }

    public function envVarsManager(): EnvVarsManagerInterface
    {
        $envVarsManager = $this->container->get(EnvVarsManagerInterface::class);

        Assert::that($envVarsManager)->isInstanceOf(EnvVarsManagerInterface::class);

        return $envVarsManager;
    }

    public function logger(): LoggerInterface
    {
        return $this->emergencyLogger;
    }

    private function loadContainer(ContainerProviderInterface $containerProvider, EnvVarsManagerInterface $envVarsManager): void
    {
        try {
            $this->container = $containerProvider->provide($this, $envVarsManager);
        } catch (Throwable $e) {
            $this->emergencyLogger->critical("Failed to load container", [
                'exception' => [
                    'message' => $e->getMessage(),
                ]
            ]);
            die();
        }
    }

    /**
     * @param EnvVarsManagerProviderInterface $envVarsManagerProvider
     * @return EnvVarsManagerInterface
     */
    public function loadEnvVarsManager(EnvVarsManagerProviderInterface $envVarsManagerProvider): EnvVarsManagerInterface
    {
        try {
            $envVarsManager = $envVarsManagerProvider->provide();
        } catch (Throwable $e) {
            $this->emergencyLogger->critical("Failed to load env vars manager", [
                'exception' => [
                    'message' => $e->getMessage(),
                ]
            ]);
            die();
        }

        return $envVarsManager;
    }
}