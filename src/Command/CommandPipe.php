<?php

namespace FashionValet\Stickie\Command;

class CommandPipe implements CommandPipeInterface
{
    protected $commands = [];

    public function addCommand(CommandInterface $command)
    {
        $this->commands[] = $command->toCommand();

        return $this;
    }

    public function removeCommand(CommandInterface $command)
    {
        $index = array_search($command->toCommand(), $this->getCommands());

        if (is_int($index)) {
            $commands = $this->getCommands();
            unset($commands[$index]);

            $this->commands = $commands;
        }

        return $this;
    }

    public function getCommands()
    {
        return $this->commands;
    }

    public function flushCommands()
    {
        $this->commands = [];

        return $this;
    }
}
