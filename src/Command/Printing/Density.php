<?php

namespace FashhionValet\Stickie\Command\Printing;

use FashionValet\Stickie\Command\AbstractableCommand;

class Density extends AbstractableCommand
{
    const MIN = 0;
    const MAX = 19;

    protected $code = 'H';

    protected $density = 0;

    public function __construct($density)
    {
        if ($this->isInRange($density, self::MIN, self::MAX)) {
            $this->density = $density;
        }
    }

    public function getDensity()
    {
        return $this->density;
    }

    public function toCommand()
    {
        return $this->getSetupPrefix().$this->getCode().$this->getDensity();
    }
}
