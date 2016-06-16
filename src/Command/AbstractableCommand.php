<?php

namespace FashionValet\Stickie\Command;

abstract class AbstractableCommand implements CommandInterface
{
    /**
     * Command code
     * @var string
     */
    protected $code;

    /**
     * Get command code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Get command control code
     *
     * @return string
     */
    protected function getControlPrefix()
    {
        return '~';
    }

    /**
     * Get command setup code
     *
     * @return string
     */
    protected function getSetupPrefix()
    {
        return '^';
    }

    /**
     * Determine if value is integer
     *
     * @param  mixed  $value
     *
     * @return boolean        [description]
     *
     * @throw \FashionValet\Stickie\Command\Exception\ExpectedIntegerException
     */
    protected function isInteger($value)
    {
        if (! is_int($value)) {
            throw new Exception\ExpectedIntegerException("Command expected parameter to be interger");
        }

        return true;
    }

    /**
     * Determine if value is within range
     *
     * @param  mixed  $value
     * @param integer $min
     * @param integer $max
     *
     * @return boolean        [description]
     *
     * @throw \FashionValet\Stickie\Command\Exception\OutOfRangeException
     */
    protected function isInRange($value, $min, $max)
    {
        if ($this->isInteger($value)) {
            if ($value >= $min && $value <= $max) {
                return true;
            }

            throw new Exception\OutOfRangeException("Command expected parameter to be between {$min} and {$max}");
        }
    }
}
