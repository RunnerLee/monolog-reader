<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Runner\MonologReader\Parsers;

/**
 * Class DefaultParser.
 */
class DefaultParser implements ParserInterface
{
    const REGEX = '/\[(?P<date>.*)\] (?P<logger>[\/_a-zA-Z0-9-]+).(?P<level>\w+): (?P<message>[^\[\{]+) (?P<context>[\[\{].*[\]\}]) (?P<extra>[\[\{].*[\]\}])/';

    /**
     * @param $row
     *
     * @return array|bool
     */
    public function parse($row)
    {
        if (0 === preg_match(static::REGEX, $row, $matches)) {
            return false;
        }

        return [
            'date'    => $matches['date'],
            'logger'  => $matches['logger'],
            'level'   => $matches['level'],
            'message' => $matches['message'],
            'context' => !empty($matches['context']) ? json_decode($matches['context'], true) : [],
            'extra'   => !empty($matches['extra']) ? json_decode($matches['extra'], true) : [],
        ];
    }
}
