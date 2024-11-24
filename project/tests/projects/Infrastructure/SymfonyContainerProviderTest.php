<?php

namespace SaaSFormation\Framework\Tests\Projects\Infrastructure;

use Monolog\Logger;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use SaaSFormation\Framework\EnvVarsManager\Infrastructure\EnvVarsManager;
use SaaSFormation\Framework\Projects\Infrastructure\SymfonyContainerProvider;
use PHPUnit\Framework\TestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;

#[CoversClass(SymfonyContainerProvider::class)]
class SymfonyContainerProviderTest extends TestCase
{
    #[Test]
    public function aProperSymfonyContainerIsProvidedWhenAValidServicesFilePathIsProvided(): void
    {
        // Arrange
        $logger = new Logger("test");
        $envVarsProvider = $this->createMock(EnvVarsManager::class);
        $symfonyContainerProvider = new SymfonyContainerProvider(__DIR__ . "/../Resources/services.yaml");

        // Act
        $symfonyContainerBuilder = $symfonyContainerProvider->provide($logger, $envVarsProvider);

        // Assert
        $this->assertInstanceOf(ContainerBuilder::class, $symfonyContainerBuilder);
    }
}
