<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 2017-04
 */

namespace Runner\MonologReader\Test;

use Runner\MonologReader\Reader;

class ReaderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Reader
     */
    protected $reader;

    public function setUp()
    {
        $this->reader = (new Reader())->loadFile(__DIR__ . '/fixtures/file.log');
    }

    public function testRead()
    {
        $log = $this->reader->read();

        $this->assertArrayHasKey('date', $log);
        $this->assertArrayHasKey('logger', $log);
        $this->assertArrayHasKey('level', $log);
        $this->assertArrayHasKey('message', $log);
        $this->assertArrayHasKey('context', $log);
        $this->assertArrayHasKey('extra', $log);
    }

    public function testSkinEmptyLine()
    {
        $count = 0;
        while ($this->reader->read()) {
            ++$count;
        }

        $this->assertSame(153, $count);
    }
}
