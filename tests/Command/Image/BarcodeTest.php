<?php

namespace TestCase\Command\Image;

use FashionValet\Stickie\Command\Image\Barcode as Command;

class BarcodeTest extends \PHPUnit_Framework_TestCase
{
    protected $command;

    public function setUp()
    {
        $this->command = new Command('CODE128', 55, 10, 2, 10, 70, 0, 1, 'Foobar');
    }

    public function tearDown()
    {
        $this->command = null;
    }

    public function testGetTypeMethod()
    {
        $this->assertEquals('Q', $this->command->getType());
    }

    public function testGetHorizontalMethod()
    {
        $this->assertEquals(55, $this->command->getHorizontal());
    }

    public function testGetVerticalMethod()
    {
        $this->assertEquals(10, $this->command->getVertical());
    }

    public function testGetNarrowMethod()
    {
        $this->assertEquals(2, $this->command->getNarrow());
    }

    public function testGetWideMethod()
    {
        $this->assertEquals(10, $this->command->getWide());
    }

    public function testGetHeightMethod()
    {
        $this->assertEquals(70, $this->command->getHeight());
    }

    public function testGetRotationMethod()
    {
        $this->assertEquals(0, $this->command->getRotation());
    }

    public function testGetTextMethod()
    {
        $this->assertEquals(1, $this->command->getText());
    }

    public function testGetValueMethod()
    {
        $this->assertEquals('Foobar', $this->command->getValue());
    }

    public function testGetCodeMethod()
    {
        $this->assertEquals('B', $this->command->getCode());
    }

    public function testToCommandMethod()
    {
        $this->assertEquals('BQ, 55, 10, 2, 10, 70, 0, 1, Foobar', $this->command->toCommand());
    }
}
