<?php declare(strict_types=1);

namespace SaaSFormation\Framework\Contracts\Application\Bus;

interface CommandHandlerInterface
{
    public function handle(CommandInterface $command): void;
}