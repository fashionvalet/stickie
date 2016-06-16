<?php

namespace FashionValet\Stickie\Command;

abstract class AbstractableCommand implements CommandInterface
{
    protected $code;

    public function getCode()
    {
        return $this->code;
    }

    protected function getControlPrefix()
    {
        return '~';
    }

    protected function getSetupPrefix()
    {
        return '^';
    }

    protected function isInteger($value)
    {
        if (! is_int($value)) {
            throw new Exception\ExpectedIntegerException("Command expected parameter to be interger");
        }

        return true;
    }
}
