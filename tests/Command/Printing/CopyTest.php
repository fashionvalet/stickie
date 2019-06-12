<?php

namespace TestCase\Command\Printing;

use FashionValet\Stickie\Command\Printing\Copy as Command;

class CopyTest extends \PHPUnit_Framework_TestCase
{
    protected $copies = 3;

    protected $command;

    public function setUp()
    {
        $this->command = new Command($this->copies);
    }

    public function tearDown()
    {
        $this->command = null;
    }

    public function testGetCopiesMethod()
    {
        $this->assertEquals($this->copies, $this->command->getCopies());
    }

    public function testGetCodeMethod()
    {
        $this->assertEquals('P', $this->command->getCode());
    }

    public function testToCommandMethod()
    {
        $this->assertEquals('^P3', $this->command->toCommand());
    }

    /**
     * @expectedException \FashionValet\Stickie\Command\Exception\ExpectedIntegerException
     * @return [type] [description]
     */
    public function testExpectedIntegerException()
    {
        $command = new Command('foo');
    }

    /**
     * @expectedException \FashionValet\Stickie\Command\Exception\OutOfRangeException
     * @return [type] [description]
     */
    public function testOutOfRangeException()
    {
        $command = new Command(1000000);
    }
}
