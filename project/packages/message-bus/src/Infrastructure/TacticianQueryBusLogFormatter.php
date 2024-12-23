<?php declare(strict_types=1);

namespace SaaSFormation\Framework\MessageBus\Infrastructure;

use Exception;
use League\Tactician\Logger\Formatter\Formatter;
use Psr\Log\LoggerInterface;
use SaaSFormation\Framework\SharedKernel\Application\Messages\QueryInterface;

class TacticianQueryBusLogFormatter implements Formatter
{
    public function logCommandReceived(LoggerInterface $logger, $command)
    {
        if(!$command instanceof QueryInterface) {
            throw new Exception('Query must be instance of CommandInterface');
        }

        $logger->debug("Query {$command->getQueryCode()} received");
    }

    public function logCommandSucceeded(LoggerInterface $logger, $command, $returnValue)
    {
        if(!$command instanceof QueryInterface) {
            throw new Exception('Query must be instance of CommandInterface');
        }

        $logger->debug("Query {$command->getQueryCode()} succeeded");
    }

    public function logCommandFailed(LoggerInterface $logger, $command, Exception $e)
    {
        if(!$command instanceof QueryInterface) {
            throw new Exception('Query must be instance of CommandInterface');
        }

        $logger->error("Query {$command->getQueryCode()} failed", [
            'error' => [
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'message' => $e->getMessage(),
            ]
        ]);
    }
}