<?php

namespace FashionValet\Stickie\Driver;

class LinuxConnector implements ConnectorInterface
{
    protected $pointer;

    public function __construct($filename)
    {
        $this->pointer = fopen($filename, 'wb+');
    }

    public function close()
    {
        fclose($this->pointer);
        $this->pointer = null;
    }

    public function send($data)
    {
        fwrite($this->pointer, $data);
    }
}
