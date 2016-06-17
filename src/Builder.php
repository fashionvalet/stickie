<?php

namespace FashionValet\Stickie;

class Builder implements BuilderInterface
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

    public function setDensity($density)
    {
        $this->commandPipe->addCommand(new Command\Printing\Density($density));

        return $this;
    }

    public function copies($copies)
    {
        $this->commandPipe->addCommand(new Command\Printing\Copy($copies));

        return $this;
    }

    public function labelStart()
    {
        $this->commandPipe->addCommand(new Command\Printing\LabelStart);

        return $this;
    }

    public function labelEnd()
    {
        $this->commandPipe->addCommand(new Command\Printing\LabelEnd);

        return $this;
    }

    public function barcode($type, $horizontal, $vertical, $narrow, $wide, $height, $rotation, $text, $value) {
        $this->commandPipe->addCommand(new Command\Image\Barcode($type, $horizontal, $vertical, $narrow, $wide, $height, $rotation, $text, $value));

        return $this;
    }

    public function text($size, $horizontal, $vertical, $magnifyHorizontal, $magnifyVertical, $gap, $rotation, $value) {
        $this->commandPipe->addCommand(new Command\Text\Font($size, $horizontal, $vertical, $magnifyHorizontal, $magnifyVertical, $gap, $rotation, $value));

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
