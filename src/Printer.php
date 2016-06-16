<?php

namespace FashionValet\Stickie;

class Printer implements PrinterInterface
{
    protected $printer;

    protected $builder;

    public function __construct(Driver\ConnectorInterface $printer, BuilderInterface $builder)
    {
        $this->printer = $printer;
        $this->builder = $builder;
    }

    public function printer()
    {
        return $this->printer;
    }

    public function builder()
    {
        return $this->builder;
    }

    public function generate()
    {
        $commands = $this->builder->compose();
        $this->printer->send($commands);
    }
}
