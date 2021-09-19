<?php

namespace FashionValet\Stickie\Driver;

use Exception;

class LinuxConnector implements ConnectorInterface
{
    protected $pointer;

    public function __construct($filename)
    {
        if (!$this->pointer = fopen($filename, 'wb+')) {
            throw new Exception('Ca not connect to printer');
        }
    }

    public function close()
    {
        fclose($this->pointer);
        $this->pointer = null;
    }

    public function send($data)
    {
        if (!fwrite($this->pointer, $data)) {
            throw new Exception('Ca not send data to printer');
        }

        return $this;
    }
}
