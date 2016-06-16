<?php

namespace FashionValet\Stickie\Driver;

interface ConnectorInterface
{
    public function close();

    public function send($data);
}
