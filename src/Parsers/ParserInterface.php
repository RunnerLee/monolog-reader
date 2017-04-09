<?php
/**
 * @author: RunnerLee
 * @email: runnerleer@gmail.com
 * @time: 16-5-27 下午5:24
 */

namespace Runner\MonologReader\Parsers;

/**
 * Interface ParserInterface
 * @package Runner\MonologReader\Parser
 */
interface ParserInterface
{
    /**
     * @param string $row
     * @return array|bool
     */
    public function parse($row);
}
