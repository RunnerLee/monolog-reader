<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-5-27 下午6:44
 */
namespace Runner\LoggerReader\Test;

use Runner\LoggerReader\Reader;

class LoggerTest extends \PHPUnit_Framework_TestCase
{

    public function testAccessLog()
    {
        $logger = new Reader();

        $row = $logger->load(__DIR__ . '/../example/data/access.log')->current();

        $this->assertEquals('ERROR', $row['level']);
    }

}
