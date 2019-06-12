<?php

namespace FashionValet\Stickie\Command\Printing;

use FashionValet\Stickie\Command\AbstractableCommand;

class LabelStart extends AbstractableCommand
{
    protected $code = 'L';

    public function toCommand()
    {
        return $this->getSetupPrefix().$this->getCode();
    }
}
