<?php

namespace FashionValet\Stickie\Command\Image;

use FashionValet\Stickie\Command\AbstractableCommand;

class Barcode extends AbstractableCommand
{
    use TypeTrait;

    protected $code = 'B';

    protected $type;

    protected $horizontal = 0;

    protected $vertical = 0;

    protected $narrow = 0;

    protected $wide = 0;

    protected $height = 0;

    protected $rotation = 0;

    protected $text = 0;

    protected $value;

    public function __construct($type, $horizontal, $vertical, $narrow, $wide, $height, $rotation, $text, $value) {
        $this->type = $this->convert($type);
        if ($this->isInteger($horizontal)) {
            $this->horizontal = $horizontal;
        }

        if ($this->isInteger($vertical)) {
            $this->vertical = $vertical;
        }

        if ($this->isInteger($narrow)) {
            $this->narrow = $narrow;
        }

        if ($this->isInteger($wide)) {
            $this->wide = $wide;
        }

        if ($this->isInteger($height)) {
            $this->height = $height;
        }

        if ($this->isInteger($rotation)) {
            $this->rotation = $rotation;
        }

        if ($this->isInteger($text)) {
            $this->text = $text;
        }

        $this->value = $value;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getHorizontal()
    {
        return $this->horizontal;
    }

    public function getVertical()
    {
        return $this->vertical;
    }

    public function getNarrow()
    {
        return $this->narrow;
    }

    public function getWide()
    {
        return $this->wide;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function getRotation()
    {
        return $this->rotation;
    }

    public function getText()
    {
        return $this->text;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function toCommand()
    {
        $commands = [
            $this->getCode().$this->getType(),
            $this->getHorizontal(),
            $this->getVertical(),
            $this->getNarrow(),
            $this->getWide(),
            $this->getHeight(),
            $this->getRotation(),
            $this->getText(),
            $this->getValue()
        ];

        return implode(', ', $commands);
    }
}
