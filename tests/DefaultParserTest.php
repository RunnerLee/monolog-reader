<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Runner\MonologReader\Test;


use Runner\MonologReader\Parsers\DefaultParser;


class DefaultParserTest extends \PHPUnit_Framework_TestCase
{
    const ROW = '[2017-03-08 23:29:36] fast-d.ERROR: GET /not/found {"statusCode":404,"params":{"get":[],"post":[]}} []';

    public function testParseRow()
    {
        $parser = new DefaultParser();
        $log = $parser->parse(static::ROW);
        $this->assertEquals([
            'date', 'logger', 'level', 'message', 'context', 'extra'
        ], array_keys($log));
    }
}
