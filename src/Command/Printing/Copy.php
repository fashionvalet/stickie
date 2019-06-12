<?php

namespace FashionValet\Stickie\Command\Printing;

use FashionValet\Stickie\Command\AbstractableCommand;

class Copy extends AbstractableCommand
{
    const MIN = 1;
    const MAX = 32767;

    protected $code = 'P';

    protected $copies = 1;

    public function __construct($copies)
    {
        if ($this->isInRange($copies, self::MIN, self::MAX)) {
            $this->copies = $copies;
        }
    }

    public function getCopies()
    {
        return $this->copies;
    }

    public function toCommand()
    {
        return $this->getSetupPrefix().$this->getCode().$this->getCopies();
    }
}
