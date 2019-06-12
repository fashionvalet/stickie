<?php

namespace FashionValet\Stickie\Command\Printing;

use FashionValet\Stickie\Command\AbstractableCommand;

class LabelEnd extends AbstractableCommand
{
    protected $code = 'E';

    public function toCommand()
    {
        return $this->getCode();
    }
}
