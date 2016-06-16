<?php

namespace TestCase;

use FashionValet\Stickie\Printer;

class PrinterTest extends \PHPUnit_Framework_TestCase
{
    protected $printer;

    public function setUp()
    {
        $connector = $this->prophesize('\FashionValet\Stickie\Driver\ConnectorInterface');

        $this->printer = new Printer($connector->reveal());
    }

    public function tearDown()
    {
        $this->printer = null;
    }

    public function testPrinterMethod()
    {
        $this->assertInstanceOf('\FashionValet\Stickie\Driver\ConnectorInterface', $this->printer->printer());
    }
}
