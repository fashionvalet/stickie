<?php

namespace FashionValet\Stickie;

class Builder
{
    protected $commandPipe;

    public function __construct(Command\CommandPipeInterface $commandPipe)
    {
        $this->commandPipe = $commandPipe;
    }

    public function getCommandPipe()
    {
        return $this->commandPipe;
    }

    public function resetMemory()
    {
        $this->commandPipe->addCommand(new Command\Memory\Format);

        return $this;
    }

    public function setLabelWidth($width)
    {
        $this->commandPipe->addCommand(new Command\Printing\Width($width));

        return $this;
    }

    public function setLabelHeight($height, $spacing = null)
    {
        $this->commandPipe->addCommand(new Command\Printing\Height($height, $spacing));

        return $this;
    }

    public function compose()
    {
        $commands = $this->commandPipe->getCommands();
        if (empty($commands)) {
            throw new Command\Exception\EmptyCommandException("There are no commands available");
        }

        $commandString = implode("\n", $commands)."\n";

        return $commandString;
    }
}
