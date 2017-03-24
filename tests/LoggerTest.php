<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-5-27 下午6:44
 */
namespace Runner\MonologReader\Test;


use Runner\MonologReader\Reader;

class LoggerTest extends \PHPUnit_Framework_TestCase
{
    public function testParseFile()
    {
        $reader = new Reader();
        $logs = $reader->readFile(__DIR__ . '/file.log');
        $this->assertEquals(153, count($logs));
    }
}
