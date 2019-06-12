<?php

namespace FashionValet\Stickie\Command\Printing;

use FashionValet\Stickie\Command\AbstractableCommand;

class Height extends AbstractableCommand
{
    protected $code = 'Q';

    protected $height = 0;

    protected $spacing;

    public function __construct($height, $spacing = null)
    {
        if ($this->isInteger($height)) {
            $this->height = $height;
        }

        if (! is_null($spacing) && $this->isInteger($spacing)) {
            $this->spacing = $spacing;
        }
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getSpacing()
    {
        return $this->spacing;
    }

    public function toCommand()
    {
        $command = $this->getSetupPrefix().$this->getCode().$this->getHeight();

        if (! is_null($this->getSpacing())) {
            return $command.','.$this->getSpacing();
        }

        return $command;
    }
}
