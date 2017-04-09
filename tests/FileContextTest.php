<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 2017-04
 */

namespace Runner\MonologReader\Test;

use Runner\MonologReader\Contexts\FileContext;

class FileContextTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var FileContext
     */
    protected $context;

    public function setUp()
    {
        $this->context = new FileContext(__DIR__.'/fixtures/file.log');
    }

    public function testGets()
    {
        $this->assertSame(true, '' !== $this->context->gets());
    }

    public function testLine()
    {
        $this->assertSame(1, $this->context->line());
    }

}
