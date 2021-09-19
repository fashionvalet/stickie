<?php

namespace TestCase;

use FashionValet\Stickie\Printer;

<<<<<<< HEAD
//class PrinterTest extends \PHPUnit_Framework_TestCase
class PrinterTest 
=======
class PrinterTest extends \PHPUnit_Framework_TestCase
>>>>>>> 2e407658ef1863d4556f15fc088c643fd7afae5d
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
