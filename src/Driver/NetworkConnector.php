<?php

namespace FashionValet\Stickie\Driver;

use Exception;

class NetworkConnector implements ConnectorInterface
{
    /**
     * The endpoint.
     *
     * @var resource
     */
    protected $socket;

    /**
     * Create an instance.
     *
     * @param string $host
     * @param int $port
     * @throws \Exception
     */
    public function __construct(string $host, int $port = 9100)
    {
        $this->connect($host, $port);
    }

    /**
     * Destroy an instance.
     */
    public function __destruct()
    {
        $this->close();
    }


    /**
     * Connect to printer.
     *
     * @param string $host
     * @param int $port
     * @throws \Exception
     */
    protected function connect(string $host, int $port): void
    {
        $this->socket = @socket_create(AF_INET, SOCK_STREAM, SOL_TCP);

        if (!$this->socket || !@socket_connect($this->socket, $host, $port)) {
            $error = $this->getLastError();
            throw new Exception($error['message'], $error['code']);
        }
    }

    /**
     * Close connection to printer.
     */
    public function close()
    {
        @socket_close($this->socket);
    }

    /**
     * Send ZPL data to printer.
     *
     * @param $data
     * @throws \Exception
     */
    public function send($data): void
    {
        if (false === @socket_write($this->socket, $data)) {
            $error = $this->getLastError();
            throw new Exception($error['message'], $error['code']);
        }
    }

    /**
     * Get the last socket error.
     *
     * @return array
     */
    protected function getLastError(): array
    {
        $code = socket_last_error($this->socket);
        $message = socket_strerror($code);

        return compact('code', 'message');
    }

    public function read()
    {
        $content = '';
        while (true) {
            $content .= @socket_read($this->socket, 256, PHP_BINARY_READ);
            if ( substr( $content,-2 ) === "\r\n") {
                break;

            }
        }
        return substr($content,0,-2);
    }
}
