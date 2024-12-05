<?php

namespace SaaSFormation\Framework\Tests\Console\UI;

use League\CLImate\CLImate;
use PHPUnit\Framework\Attributes\CoversClass;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Log\LoggerInterface;
use SaaSFormation\Framework\Console\Infrastructure\Input;
use SaaSFormation\Framework\Console\UI\CommandArgument;
use SaaSFormation\Framework\Console\UI\CommandArgumentsCollection;
use SaaSFormation\Framework\Console\UI\CommandOption;
use SaaSFormation\Framework\Console\UI\CommandOptionsCollection;

#[CoversClass(MockCommand::class)]
class MockCommandTest extends TestCase
{
    public function testMockCommandReturns0(): void
    {
        // Arrange
        /** @var LoggerInterface&MockObject $logger */
        $logger = $this->createMock(LoggerInterface::class);
        $logger->expects($this->once())->method('info')->with('xml', ['argument' => 'bar']);
        $mockCommand = new MockCommand($logger);
        $argumentsCollection = new CommandArgumentsCollection();
        $argumentsCollection->add('foo', new CommandArgument('bar'));
        $optionsCollection = new CommandOptionsCollection();
        $optionsCollection->add('format', new CommandOption('xml'));
        $input = new Input(
            $argumentsCollection,
            $optionsCollection
        );
        $cliMate = new CLImate();

        // Act
        $result = $mockCommand->execute($input, $cliMate);

        // Assert
        $this->assertEquals(0, $result);
    }
}
