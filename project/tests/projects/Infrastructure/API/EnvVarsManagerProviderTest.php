<?php

namespace SaaSFormation\Framework\Tests\Projects\Infrastructure\API;

use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\Attributes\Test;
use SaaSFormation\Framework\EnvVarsManager\Infrastructure\EnvVarsManager;
use SaaSFormation\Framework\Projects\Infrastructure\EnvVarsManagerProvider;
use PHPUnit\Framework\TestCase;

#[CoversClass(EnvVarsManagerProvider::class)]
#[CoversClass(EnvVarsManager::class)]
class EnvVarsManagerProviderTest extends TestCase
{
    #[Test]
    public function aProperEnvVarsManagerIsProvidedWhenAValidConfigFilePathIsProvided(): void
    {
        // Arrange
        $envVarsManagerProvider = new EnvVarsManagerProvider(__DIR__ . "/../../../env-vars-manager/Resources/vars.yaml");

        // Act
        $envVarsManager = $envVarsManagerProvider->provide();

        // Assert
        $this->assertInstanceOf(EnvVarsManager::class, $envVarsManager);
    }
}
