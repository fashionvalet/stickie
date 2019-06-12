<?php

namespace FashionValet\Stickie;

use Driver\ConnectorInterface;

interface PrinterInterface
{
    public function printer();

    public function generate();
}
