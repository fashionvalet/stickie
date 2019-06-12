<?php

namespace FashionValet\Stickie\Command\Text;

use FashionValet\Stickie\Command\AbstractableCommand;

class Font extends AbstractableCommand
{
    use SizeTrait;

    protected $code ='A';

    protected $font = 10;

    protected $horizontal = 0;

    protected $vertical = 0;

    protected $magnifyHorizontal = 0;

    protected $magnifyVertical = 0;

    protected $gap = 0;

    protected $rotation = 0;

    protected $value;

    public function __construct($size, $horizontal, $vertical, $magnifyHorizontal, $magnifyVertical, $gap, $rotation, $value)
    {
        if ($this->isInteger($size)) {
            $this->font = $this->convert($size);
        }

        if ($this->isInteger($horizontal)) {
            $this->horizontal = $horizontal;
        }

        if ($this->isInteger($vertical)) {
            $this->vertical = $vertical;
        }

        if ($this->isInteger($magnifyHorizontal)) {
            $this->magnifyHorizontal = $magnifyHorizontal;
        }

        if ($this->isInteger($magnifyVertical)) {
            $this->magnifyVertical = $magnifyVertical;
        }

        if ($this->isInteger($gap)) {
            $this->gap = $gap;
        }

        if ($this->isInteger($rotation)) {
            $this->rotation = $rotation;
        }

        $this->value = $value;
    }

    public function getFont()
    {
        return $this->font;
    }

    public function getHorizontal()
    {
        return $this->horizontal;
    }

    public function getVertical()
    {
        return $this->vertical;
    }

    public function getMagnifyHorizontal()
    {
        return $this->magnifyHorizontal;
    }

    public function getMagnifyVertical()
    {
        return $this->magnifyVertical;
    }

    public function getGap()
    {
        return $this->gap;
    }

    public function getRotation()
    {
        return $this->rotation;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function toCommand()
    {
        $commands = [
            $this->getCode().$this->getFont(),
            $this->getHorizontal(),
            $this->getVertical(),
            $this->getMagnifyHorizontal(),
            $this->getMagnifyVertical(),
            $this->getGap(),
            $this->getRotation(),
            $this->getValue()
        ];

        return implode(', ', $commands);
    }
}
