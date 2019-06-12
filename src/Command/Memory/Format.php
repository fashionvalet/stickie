<?php

namespace FashionValet\Stickie\Command\Memory;

use FashionValet\Stickie\Command\AbstractableCommand;

class Format extends AbstractableCommand
{
    protected $code = 'MDEL';

    public function toCommand()
    {
        return $this->getControlPrefix().$this->getCode();
    }
}
