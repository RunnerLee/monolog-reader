<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Runner\MonologReader\Parser;


use LogicException;

/**
 * Class DefaultParser
 * @package Runner\MonologReader\Parser
 */
class DefaultParser implements ParserInterface
{
    const REGEX = '/\[(?P<date>.*)\] (?P<logger>[\/_a-zA-Z0-9-]+).(?P<level>\w+): (?P<message>[^\[\{]+) (?P<context>[\[\{].*[\]\}]) (?P<extra>[\[\{].*[\]\}])/';

    /**
     * @param $row
     * @param int $index
     * @return array
     */
    public function parse($row, $index = 0)
    {
        if (0 === preg_match(static::REGEX, $row, $matches)) {
            throw new LogicException('Row parse exception line in ' . $index);
        }

        return [
            'date' => $matches['date'],
            'logger' => $matches['logger'],
            'level' => $matches['level'],
            'message' => $matches['message'],
            'context' => !empty($matches['context']) ? json_decode($matches['context'], true) : [],
            'extra' => !empty($matches['extra']) ? json_decode($matches['extra'], true) : [],
        ];
    }
}