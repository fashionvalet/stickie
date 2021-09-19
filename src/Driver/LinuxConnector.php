<?php

namespace FashionValet\Stickie\Driver;

<<<<<<< HEAD
use Exception;

=======
>>>>>>> 2e407658ef1863d4556f15fc088c643fd7afae5d
class LinuxConnector implements ConnectorInterface
{
    protected $pointer;

    public function __construct($filename)
    {
<<<<<<< HEAD
        new WindowsPrintConnector();
        if (!$this->pointer = fopen($filename, 'wb+')) {
            throw new Exception('Ca not connect to printer');
        }
=======
        $this->pointer = fopen($filename, 'wb+');
>>>>>>> 2e407658ef1863d4556f15fc088c643fd7afae5d
    }

    public function close()
    {
        fclose($this->pointer);
        $this->pointer = null;
    }

    public function send($data)
    {
<<<<<<< HEAD
        if (!fwrite($this->pointer, $data)) {
            throw new Exception('Ca not send data to printer');
        }

        return $this;
    }

    public function read()
    {
        sleep(2);
        $readData = '';
        while (!feof($this->pointer)) {
            $readData .= fgets($this->pointer);
        }

        return $readData;
    }
=======
        fwrite($this->pointer, $data);

        return $this;
    }
>>>>>>> 2e407658ef1863d4556f15fc088c643fd7afae5d
}
