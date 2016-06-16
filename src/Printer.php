<?php

namespace FashionValet\Stickie;

class Printer implements PrinterInterface
{
    protected $printer;

    public function __construct(Driver\ConnectorInterface $printer)
    {
        $this->printer = $printer;
    }

    public function printer()
    {
        return $this->printer;
    }

    public function generate()
    {
        //
    }
}
