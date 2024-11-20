<?php

namespace SaaSFormation\Framework\Tests\EnvVarsManager\Infrastructure;

use PHPUnit\Framework\Attributes\Test;
use SaaSFormation\Framework\EnvVarsManager\Infrastructure\EnvVarsManager;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\TestCase;

#[CoversClass(EnvVarsManager::class)]
class EnvVarsManagerTest extends TestCase
{
    #[Test]
    public function checkGivenNeededEnvVarsExistProperVariablesWithProperTypesAreRetrieved(): void
    {
        // Arrange
        $envVarsManager = new EnvVarsManager(__DIR__ . "/../Resources/vars.yaml");

        // Act
        $stringVar = $envVarsManager->get("STRING_VAR");
        $intVar = $envVarsManager->get("INT_VAR");
        $boolVar = $envVarsManager->get("BOOL_VAR");

        // Assert
        $this->assertTrue($envVarsManager->has("STRING_VAR"));
        $this->assertTrue($envVarsManager->has("INT_VAR"));
        $this->assertTrue($envVarsManager->has("BOOL_VAR"));
        $this->assertEquals("foo", $stringVar);
        $this->assertEquals(25, $intVar);
        $this->assertEquals(false, $boolVar);
    }

    #[Test]
    public function exceptionIsThrownWhenTriedToGetAVariableThatIsNotSet(): void
    {
        // Arrange
        $key = "foo";
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Env var '$key' does not exist");
        $envVarsManager = new EnvVarsManager(__DIR__ . "/../Resources/vars.yaml");

        // Act
        $envVarsManager->get($key);

        // Assert on act
    }

    #[Test]
    public function exceptionIsThrownWhenARequiredVariableIsNotSet(): void
    {
        // Arrange
        $key = "OTHER_BOOL_VAR";
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Env var $key is mandatory but was not provided");

        // Act
        new EnvVarsManager(__DIR__ . "/../Resources/vars_other.yaml");

        // Assert on act
    }
}
