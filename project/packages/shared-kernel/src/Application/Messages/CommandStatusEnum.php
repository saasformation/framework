<?php

namespace SaaSFormation\Framework\SharedKernel\Application\Messages;

enum CommandStatusEnum: string
{
    case PENDING = 'PENDING';
    case SUCCEEDED = 'SUCCEEDED';
    case FAILED = 'FAILED';
}
