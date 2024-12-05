<?php

namespace SaaSFormation\Framework\Tests\Console\UI;

use League\CLImate\CLImate;
use Psr\Log\LoggerInterface;
use SaaSFormation\Framework\Console\UI\Command;
use SaaSFormation\Framework\Console\UI\InputInterface;

readonly class MockCommand extends Command
{
    public function __construct(private LoggerInterface $logger)
    {
    }

    public function cliLine(): string
    {
        return 'common:status --format=json foo';
    }

    public function description(): string
    {
        return "Prints system status";
    }

    public function execute(InputInterface $input, CLImate $output): int
    {
        $this->logger->info($input->options()->get('format')->value(), ['argument' => $input->arguments()->get('foo')->value()]);

        return 0;
    }
}