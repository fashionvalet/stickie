<?php

namespace TestCase;

use FashionValet\Stickie\Printer;

//class PrinterTest extends \PHPUnit_Framework_TestCase
class PrinterTest 
{
    protected $printer;

    public function setUp()
    {
        $connector = $this->prophesize('\FashionValet\Stickie\Driver\ConnectorInterface');
        $builder = $this->prophesize('\FashionValet\Stickie\BuilderInterface');

        $this->printer = new Printer($connector->reveal(), $builder->reveal());
    }

    public function tearDown()
    {
        $this->printer = null;
    }

    public function testPrinterMethod()
    {
        $this->assertInstanceOf('\FashionValet\Stickie\Driver\ConnectorInterface', $this->printer->printer());
    }

    public function testBuilderMethod()
    {
        $this->assertInstanceOf('\FashionValet\Stickie\BuilderInterface', $this->printer->builder());
    }
}
