<?php
namespace App\Exception\Supervisor;

use App\Exception\Supervisor;
use Psr\Log\LogLevel;
use Throwable;

class AlreadyRunning extends Supervisor
{
    public function __construct(
        string $message = 'Process was already running.',
        int $code = 0,
        Throwable $previous = null,
        string $loggerLevel = LogLevel::INFO
    ) {
        parent::__construct($message, $code, $previous, $loggerLevel);
    }
}
