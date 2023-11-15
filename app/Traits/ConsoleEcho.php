<?php
namespace App\Traits;

trait ConsoleEcho
{
    private function echoStart(string $message): void
    {
        echo "{$message}";
    }

    private function echoFinish(string $message): void
    {
        $strWidth = strlen($message) + strlen(' DONE');
        $terminalWidth = (int)shell_exec('tput cols');
        if (!$terminalWidth || $terminalWidth > 100) {
            $terminalWidth = 100;
        } else if ($terminalWidth <= $strWidth) {
            $terminalWidth = $strWidth + 1;
        }
        $padding = str_repeat('.', $terminalWidth - $strWidth);
        echo "{$padding} DONE" . PHP_EOL;
    }

    private function executeWithLogging(string $message, callable $callback): void
    {
        $this->echoStart($message);
        $callback();
        $this->echoFinish($message);
    }

}
