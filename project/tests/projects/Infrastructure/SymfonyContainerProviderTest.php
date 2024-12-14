<?php

namespace SaaSFormation\Framework\Tests\Projects\Infrastructure;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use SaaSFormation\Framework\Contracts\Infrastructure\EnvVarsManagerInterface;
use SaaSFormation\Framework\Contracts\Infrastructure\KernelInterface;
use SaaSFormation\Framework\Projects\Infrastructure\SymfonyContainerProvider;
use Symfony\Component\DependencyInjection\ContainerBuilder;

#[CoversClass(SymfonyContainerProvider::class)]
class SymfonyContainerProviderTest extends TestCase
{
    #[Test]
    public function aProperSymfonyContainerIsProvidedWhenAValidServicesFilePathIsProvided(): void
    {
        // Arrange
        /** @var KernelInterface&MockObject $kernel */
        $kernel = $this->createMock(KernelInterface::class);
        /** @var EnvVarsManagerInterface&MockObject $envVarsManager */
        $envVarsManager = $this->createMock(EnvVarsManagerInterface::class);
        /** @var LoggerInterface&MockObject $logger */
        $logger = $this->createMock(LoggerInterface::class);
        $symfonyContainerProvider = new SymfonyContainerProvider(__DIR__ . "/../Resources/services.yaml");

        // Act
        $symfonyContainerBuilder = $symfonyContainerProvider->provide($kernel, $envVarsManager, $logger);

        // Assert
        $this->assertInstanceOf(ContainerBuilder::class, $symfonyContainerBuilder);
    }
}
