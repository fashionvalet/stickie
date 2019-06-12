<?php

namespace TestCase\Driver;

use FashionValet\Stickie\Driver\LinuxConnector as Connector;

class LinuxDriverTest extends \PHPUnit_Framework_TestCase
{
    protected $connector;

    public function setUp()
    {
        $this->connector = new Connector(__DIR__.'/../stub');
    }

    public function testSendMethod()
    {
        $this->connector->send('ABC');
    }

    public function testCloseMethod()
    {
        $this->connector->close();
    }
}
