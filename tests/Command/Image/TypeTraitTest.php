<?php

namespace TestCase\Command\Image;

use FashionValet\Stickie\Command\Image\TypeTrait;

class TypeTraitTest extends \PHPUnit_Framework_TestCase
{
    protected $stub;

    public function setUp()
    {
        $this->stub = new Stub;
    }

    public function tearDown()
    {
        $this->stub = null;
    }

    public function testCode39Type()
    {
        $this->assertEquals('A', $this->stub->convertBarcode('CODE39'));
    }

    public function testLogmarsType()
    {
        $this->assertEquals('A7', $this->stub->convertBarcode('LOGMARS'));
    }

    public function testCode32Type()
    {
        $this->assertEquals('A8', $this->stub->convertBarcode('CODE32'));
    }

    public function testEAN8Type()
    {
        $this->assertEquals('B', $this->stub->convertBarcode('EAN8'));
    }

    public function testEAN13Type()
    {
        $this->assertEquals('E', $this->stub->convertBarcode('EAN13'));
    }

    public function testUPCAType()
    {
        $this->assertEquals('H', $this->stub->convertBarcode('UPCA'));
    }

    public function testUPCEType()
    {
        $this->assertEquals('K', $this->stub->convertBarcode('UPCE'));
    }

    public function testI2OF5Type()
    {
        $this->assertEquals('N', $this->stub->convertBarcode('I2OF5'));
    }

    public function testSTANDARD2OF5Type()
    {
        $this->assertEquals('N4', $this->stub->convertBarcode('STANDARD2OF5'));
    }

    public function testINDUSTRIAL2OF5Type()
    {
        $this->assertEquals('N5', $this->stub->convertBarcode('INDUSTRIAL2OF5'));
    }

    public function testCodabarType()
    {
        $this->assertEquals('O', $this->stub->convertBarcode('CODABAR'));
    }

    public function testCode93Type()
    {
        $this->assertEquals('P', $this->stub->convertBarcode('CODE93'));
    }

    public function testCode128Type()
    {
        $this->assertEquals('Q', $this->stub->convertBarcode('CODE128'));
    }

    public function testCode128AType()
    {
        $this->assertEquals('Q2', $this->stub->convertBarcode('CODE128A'));
    }

    public function testCode128BType()
    {
        $this->assertEquals('Q2', $this->stub->convertBarcode('CODE128B'));
    }

    public function testCode128CType()
    {
        $this->assertEquals('Q2', $this->stub->convertBarcode('CODE128C'));
    }
}

class Stub
{
    use TypeTrait;

    public function convertBarcode($type)
    {
        return $this->convert($type);
    }
}
